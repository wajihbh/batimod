<?php

declare(strict_types=1);

session_start();

if (isset($_SESSION['login'])) {
    header('location: ../admin/authentification.php');
    exit;
}

if (!isset($_POST['login'], $_POST['pass']) || $_POST['login'] === '' || $_POST['pass'] === '') {
    echo "un champ au moins n'est pas saisie svp verifier votre saisie";
    ?>
    <script>
    window.alert('erreur : verifier votre saisie');
    document.location.href = "autentification.php";
    </script>
    <?php
    exit;
}

$login = trim((string) $_POST['login']);
$password = (string) $_POST['pass'];

require dirname(__DIR__) . '/includes/dbConnect.php';

$stmt = mysqli_prepare(
    $con,
    'SELECT 1 FROM personne WHERE login = ? AND admin = 1 AND password = ? LIMIT 1'
);
if ($stmt === false) {
    error_log('bio/images/login: ' . mysqli_error($con));
    http_response_code(503);
    exit('Service unavailable');
}
mysqli_stmt_bind_param($stmt, 'ss', $login, $password);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

if ($res && mysqli_fetch_row($res)) {
    mysqli_free_result($res);
    header('location: ../admin/ext/index.php');
    exit;
}
if ($res instanceof mysqli_result) {
    mysqli_free_result($res);
}
?>
<script>
window.alert('identification impossible');
document.location.href = "autentification.php";
</script>
