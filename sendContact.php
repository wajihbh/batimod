<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php?msg=invalid');
    exit;
}

$nom = trim((string) ($_POST['nom'] ?? ''));
$prenom = trim((string) ($_POST['prenom'] ?? ''));
$tel = trim((string) ($_POST['tel'] ?? ''));
$email = trim((string) ($_POST['mail'] ?? ''));
$msg = trim((string) ($_POST['comments'] ?? ''));

$maxField = 255;
$maxMsg = 8000;
if ($nom === '' || $prenom === '' || $email === '' || $msg === '') {
    header('Location: contact.php?msg=failed');
    exit;
}
if (strlen($nom) > $maxField || strlen($prenom) > $maxField || strlen($tel) > $maxField
    || strlen($email) > $maxField || strlen($msg) > $maxMsg) {
    header('Location: contact.php?msg=failed');
    exit;
}

$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
if ($emailValid === false) {
    header('Location: contact.php?msg=failed');
    exit;
}

require __DIR__ . '/includes/dbConnect.php';

$stmt = mysqli_prepare($con, 'INSERT INTO contact (nom,prenom,tel,mail,msg,replyed) VALUES (?,?,?,?,?,0)');
if ($stmt === false) {
    error_log('sendContact: prepare failed — ' . mysqli_error($con));
    header('Location: contact.php?msg=failed');
    exit;
}

mysqli_stmt_bind_param($stmt, 'sssss', $nom, $prenom, $tel, $emailValid, $msg);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if (!$ok) {
    error_log('sendContact: insert failed — ' . mysqli_error($con));
    header('Location: contact.php?msg=failed');
    exit;
}

$siteFrom = getenv('BATIMOD_MAIL_FROM') ?: 'noreply@batimod.com';
$siteTo = getenv('BATIMOD_MAIL_TO') ?: 'contact@batimod.com';
$subject = 'Contact en ligne';
$body = "Nom: {$nom}\nPrénom: {$prenom}\nTél: {$tel}\nE-mail: {$emailValid}\n\n{$msg}";

$autoload = __DIR__ . '/vendor/autoload.php';
if (is_readable($autoload)) {
    require_once $autoload;
    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(false);

        $smtpHost = getenv('BATIMOD_SMTP_HOST');
        if ($smtpHost !== false && $smtpHost !== '') {
            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->Port = (int) (getenv('BATIMOD_SMTP_PORT') ?: 587);
            $mail->SMTPAuth = true;
            $mail->Username = (string) (getenv('BATIMOD_SMTP_USER') ?: '');
            $mail->Password = (string) (getenv('BATIMOD_SMTP_PASS') ?: '');
            $enc = strtolower((string) (getenv('BATIMOD_SMTP_SECURE') ?: 'tls'));
            $mail->SMTPSecure = $enc === 'ssl' ? 'ssl' : 'tls';
        }

        $mail->setFrom($siteFrom, 'BATIMOD');
        $mail->addAddress($siteTo, 'Contact BATIMOD');
        $mail->addReplyTo($emailValid, $nom . ' ' . $prenom);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send();
    } catch (Throwable $e) {
        error_log('sendContact PHPMailer: ' . $e->getMessage());
    }
} else {
    $safeHeaders = static function (string $v): string {
        return str_replace(["\r", "\n"], '', $v);
    };
    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $safeHeaders('BATIMOD <' . $siteFrom . '>'),
        'Reply-To: ' . $safeHeaders($emailValid),
    ];
    if (!@mail(
        $siteTo,
        '=?UTF-8?B?' . base64_encode($subject) . '?=',
        $body,
        implode("\r\n", $headers)
    )) {
        error_log('sendContact: mail() failed (message stored in DB)');
    }
}

header('Location: contact.php?msg=sucess');
exit;
