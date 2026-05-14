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

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare('UPDATE contact SET replyed = 1 WHERE id = ? LIMIT 1');
    $stmt->execute([$idContact]);

    $dateRep = date('Y-m-d H:i:s');
    $stmt2 = $pdo->prepare(
        'INSERT INTO reponsecontact (idRep, contenuReponse, dateReponse) VALUES (?, ?, ?)'
    );
    $stmt2->execute([$idContact, $body, $dateRep]);

    $pdo->commit();
    header('Location: gestionContact.php?err=successSendingReply');
    exit;
} catch (Throwable $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('replyContact: ' . $e->getMessage());
}

header('Location: gestionContact.php?err=failedSendingReply');
exit;
