<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?err=loginNeeded');
    exit;
}

$login = trim((string) ($_POST['login'] ?? ''));
$pass = (string) ($_POST['pass'] ?? '');

if ($login === '') {
    header('Location: index.php?err=loginNeeded');
    exit;
}
if ($pass === '') {
    header('Location: index.php?err=passNeeded');
    exit;
}

require __DIR__ . '/includes/dbConnect.php';

$hash = md5($pass);

$stmt = mysqli_prepare(
    $con,
    'SELECT idCompte, lastAcess FROM adminuser WHERE login = ? AND pass = ? AND hashpass = ? LIMIT 1'
);
if ($stmt === false) {
    error_log('connectAdmin: prepare failed — ' . mysqli_error($con));
    header('Location: index.php?err=authError');
    exit;
}

mysqli_stmt_bind_param($stmt, 'sss', $login, $pass, $hash);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = $result ? mysqli_fetch_assoc($result) : false;
mysqli_stmt_close($stmt);

if ($row === false || $row === null) {
    header('Location: index.php?err=loginUnknown');
    exit;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_regenerate_id(true);
$_SESSION['userLogin'] = $login;
$_SESSION['userPass'] = $hash;
$_SESSION['userId'] = (int) $row['idCompte'];
$_SESSION['lastAcess'] = $row['lastAcess'];

$now = date('Y-m-d H:i:s');
$stmt2 = mysqli_prepare(
    $con,
    'UPDATE adminuser SET lastAcess = ? WHERE login = ? AND pass = ? AND hashpass = ? LIMIT 1'
);
if ($stmt2 === false) {
    error_log('connectAdmin: update prepare failed — ' . mysqli_error($con));
    header('Location: index.php?err=identificationError');
    exit;
}
mysqli_stmt_bind_param($stmt2, 'ssss', $now, $login, $pass, $hash);
$ok = mysqli_stmt_execute($stmt2);
mysqli_stmt_close($stmt2);

if (!$ok) {
    header('Location: index.php?err=identificationError');
    exit;
}

header('Location: menu.php');
exit;
