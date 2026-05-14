<?php

declare(strict_types=1);

require __DIR__ . '/headerInfo.php';

$to = isset($_POST['emailClient']) ? trim((string) $_POST['emailClient']) : '';
if ($to === '' || filter_var($to, FILTER_VALIDATE_EMAIL) === false) {
    header('Location: gestionContact.php?err=failedSendingReply');
    exit;
}

$body = (string) ($_POST['reponse'] ?? '');
$idContact = isset($_POST['idContact']) ? (int) $_POST['idContact'] : 0;
if ($idContact <= 0) {
    header('Location: gestionContact.php?err=failedSendingReply');
    exit;
}

$subject = 'Réponse à votre contact';
$mailSafeHeader = static function (string $v): string {
    return str_replace(["\r", "\n"], '', $v);
};
$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: ' . $mailSafeHeader('Afrique Beton <contact@afrique-beton.com>'),
];

$encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

if (!@mail($to, $encodedSubject, $body, implode("\r\n", $headers))) {
    header('Location: gestionContact.php?err=failedSendingReply');
    exit;
}

require __DIR__ . '/includes/dbConnect.php';

mysqli_begin_transaction($con);
try {
    $stmt = mysqli_prepare($con, 'UPDATE contact SET replyed = 1 WHERE id = ? LIMIT 1');
    if ($stmt === false) {
        throw new RuntimeException(mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, 'i', $idContact);
    mysqli_stmt_execute($stmt);
    $upd = mysqli_stmt_affected_rows($stmt) >= 0;
    mysqli_stmt_close($stmt);

    $stmt2 = mysqli_prepare(
        $con,
        'INSERT INTO reponsecontact (idRep, contenuReponse, dateReponse) VALUES (?, ?, ?)'
    );
    if ($stmt2 === false) {
        throw new RuntimeException(mysqli_error($con));
    }
    $dateRep = date('Y-m-d H:i:s');
    mysqli_stmt_bind_param($stmt2, 'iss', $idContact, $body, $dateRep);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);

    if ($upd) {
        mysqli_commit($con);
        header('Location: gestionContact.php?err=successSendingReply');
        exit;
    }
    mysqli_rollback($con);
} catch (Throwable $e) {
    mysqli_rollback($con);
    error_log('replyContact: ' . $e->getMessage());
}

header('Location: gestionContact.php?err=failedSendingReply');
exit;
