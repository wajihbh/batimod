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

require_once __DIR__ . '/../includes/dbConnect.php';

$hash = md5($pass);

try {
    $stmt = $pdo->prepare(
        'SELECT idCompte, lastAcess FROM adminuser WHERE login = ? AND pass = ? AND hashpass = ? LIMIT 1'
    );
    $stmt->execute([$login, $pass, $hash]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log('connectAdmin: query failed — ' . $e->getMessage());
    header('Location: index.php?err=authError');
    exit;
}

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
try {
    $stmt2 = $pdo->prepare(
        'UPDATE adminuser SET lastAcess = ? WHERE login = ? AND pass = ? AND hashpass = ? LIMIT 1'
    );
    $stmt2->execute([$now, $login, $pass, $hash]);
} catch (PDOException $e) {
    error_log('connectAdmin: update failed — ' . $e->getMessage());
    header('Location: index.php?err=identificationError');
    exit;
}

header('Location: menu.php');
exit;
