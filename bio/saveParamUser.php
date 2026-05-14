<?php

include 'headerInfo.php';
include 'includes/dbConnect.php';

$loginS = (string) ($_SESSION['userLogin'] ?? '');
$userIdS = (int) ($_SESSION['userId'] ?? 0);
$idRaw = base64_decode((string) ($_POST['id'] ?? ''), true);
$idCompte = is_string($idRaw) ? (int) $idRaw : 0;

if ($idCompte <= 0 || $userIdS <= 0 || $idCompte !== $userIdS) {
    header('Location: gestionCompte.php?err=LoggerInvalid');
    exit;
}

$chk = mysqli_prepare(
    $con,
    'SELECT 1 FROM adminuser WHERE idCompte = ? AND login = ? LIMIT 1'
);
if ($chk === false) {
    header('Location: gestionCompte.php?err=LoggerError');
    exit;
}
mysqli_stmt_bind_param($chk, 'is', $idCompte, $loginS);
mysqli_stmt_execute($chk);
$resChk = mysqli_stmt_get_result($chk);
mysqli_stmt_close($chk);
if (!$resChk || mysqli_num_rows($resChk) !== 1) {
    if ($resChk instanceof mysqli_result) {
        mysqli_free_result($resChk);
    }
    header('Location: gestionCompte.php?err=LoggerUnauthorized');
    exit;
}
mysqli_free_result($resChk);

$max = 255;

if (isset($_POST['nom']) && $_POST['nom'] !== '') {
    $nom = substr(trim((string) $_POST['nom']), 0, $max);
    $stmt = mysqli_prepare($con, 'UPDATE adminuser SET nom = ? WHERE idCompte = ? LIMIT 1');
    if ($stmt === false || !mysqli_stmt_bind_param($stmt, 'si', $nom, $idCompte) || !mysqli_stmt_execute($stmt)) {
        header('Location: gestionCompte.php?err=LastNameLoggerError');
        exit;
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['prenom']) && $_POST['prenom'] !== '') {
    $prenom = substr(trim((string) $_POST['prenom']), 0, $max);
    $stmt = mysqli_prepare($con, 'UPDATE adminuser SET prenom = ? WHERE idCompte = ? LIMIT 1');
    if ($stmt === false || !mysqli_stmt_bind_param($stmt, 'si', $prenom, $idCompte) || !mysqli_stmt_execute($stmt)) {
        header('Location: gestionCompte.php?err=FirstNameLoggerError');
        exit;
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['login']) && $_POST['login'] !== '') {
    $newLogin = substr(trim((string) $_POST['login']), 0, $max);
    $stmt = mysqli_prepare($con, 'UPDATE adminuser SET login = ? WHERE idCompte = ? LIMIT 1');
    if ($stmt === false || !mysqli_stmt_bind_param($stmt, 'si', $newLogin, $idCompte) || !mysqli_stmt_execute($stmt)) {
        header('Location: gestionCompte.php?err=LoginLoggerError');
        exit;
    }
    mysqli_stmt_close($stmt);
    $_SESSION['userLogin'] = $newLogin;
}

if (isset($_POST['mdp']) && $_POST['mdp'] !== '') {
    $mdp = (string) $_POST['mdp'];
    if (strlen($mdp) > $max) {
        header('Location: gestionCompte.php?err=PassLoggerError');
        exit;
    }
    $colRes = mysqli_query($con, "SHOW COLUMNS FROM `adminuser` LIKE 'password_hash'");
    $hasPasswordHashCol = $colRes instanceof mysqli_result && mysqli_num_rows($colRes) > 0;
    if ($colRes instanceof mysqli_result) {
        mysqli_free_result($colRes);
    }
    if ($hasPasswordHashCol) {
        $ph = password_hash($mdp, PASSWORD_DEFAULT);
        $empty = '';
        $stmt = mysqli_prepare(
            $con,
            'UPDATE adminuser SET password_hash = ?, pass = ?, hashpass = ? WHERE idCompte = ? LIMIT 1'
        );
        if ($stmt === false || !mysqli_stmt_bind_param($stmt, 'sssi', $ph, $empty, $empty, $idCompte) || !mysqli_stmt_execute($stmt)) {
            header('Location: gestionCompte.php?err=PassLoggerError');
            exit;
        }
        mysqli_stmt_close($stmt);
    } else {
        $mdpHash = md5($mdp);
        $stmt = mysqli_prepare($con, 'UPDATE adminuser SET pass = ?, hashpass = ? WHERE idCompte = ? LIMIT 1');
        if ($stmt === false || !mysqli_stmt_bind_param($stmt, 'ssi', $mdp, $mdpHash, $idCompte) || !mysqli_stmt_execute($stmt)) {
            header('Location: gestionCompte.php?err=PassLoggerError');
            exit;
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($con);
header('Location: gestionCompte.php?err=SucessLoggerApt');
exit;
