<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?err=invalid');
    exit;
}

$login = trim((string) ($_POST['login'] ?? ''));
$pass = (string) ($_POST['pass'] ?? '');

if ($login === '' || $pass === '') {
    header('Location: index.php?err=loginNeeded');
    exit;
}

require __DIR__ . '/includes/dbConnect.php';

$stmt = mysqli_prepare(
    $con,
    'SELECT * FROM adminuser WHERE login = ? LIMIT 1'
);
if ($stmt === false) {
    error_log('connectAdmin: prepare failed — ' . mysqli_error($con));
    header('Location: index.php?err=authError');
    exit;
}

mysqli_stmt_bind_param($stmt, 's', $login);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = $result ? mysqli_fetch_assoc($result) : null;
mysqli_stmt_close($stmt);

if ($data === null) {
    header('Location: index.php?err=loginUnknown');
    exit;
}

$passwordHashCol = isset($data['password_hash']) ? (string) $data['password_hash'] : '';
$authenticated = false;

if ($passwordHashCol !== '') {
    $authenticated = password_verify($pass, $passwordHashCol);
} else {
    $legacyMd5 = md5($pass);
    $authenticated = hash_equals((string) ($data['hashpass'] ?? ''), $legacyMd5)
        && hash_equals((string) ($data['pass'] ?? ''), $pass);
    if ($authenticated) {
        $colRes = mysqli_query($con, "SHOW COLUMNS FROM `adminuser` LIKE 'password_hash'");
        $hasPasswordHashCol = $colRes instanceof mysqli_result && mysqli_num_rows($colRes) > 0;
        if ($colRes instanceof mysqli_result) {
            mysqli_free_result($colRes);
        }
        if ($hasPasswordHashCol && $passwordHashCol === '') {
            $newHash = password_hash($pass, PASSWORD_DEFAULT);
            $uid = (int) ($data['idCompte'] ?? 0);
            if ($uid > 0) {
                $mig = mysqli_prepare(
                    $con,
                    'UPDATE adminuser SET password_hash = ? WHERE idCompte = ? LIMIT 1'
                );
                if ($mig !== false) {
                    mysqli_stmt_bind_param($mig, 'si', $newHash, $uid);
                    mysqli_stmt_execute($mig);
                    mysqli_stmt_close($mig);
                }
            }
        }
    }
}

if (!$authenticated) {
    header('Location: index.php?err=loginUnknown');
    exit;
}

session_start();
session_regenerate_id(true);
$_SESSION['userLogin'] = $login;
$_SESSION['userId'] = (int) ($data['idCompte'] ?? 0);
$_SESSION['lastAcess'] = (string) ($data['lastAcess'] ?? '');

$now = date('Y-m-d H:i:s');
$uid = (int) ($data['idCompte'] ?? 0);
$stmt2 = mysqli_prepare($con, 'UPDATE adminuser SET lastAcess = ? WHERE idCompte = ? LIMIT 1');
if ($stmt2 === false) {
    header('Location: index.php?err=identificationError');
    exit;
}

mysqli_stmt_bind_param($stmt2, 'si', $now, $uid);
$upd = mysqli_stmt_execute($stmt2);
mysqli_stmt_close($stmt2);

if (!$upd) {
    header('Location: index.php?err=identificationError');
    exit;
}

header('Location: menu.php');
exit;
