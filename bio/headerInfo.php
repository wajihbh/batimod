<?php

declare(strict_types=1);

session_start();
if (!isset($_SESSION['userLogin'], $_SESSION['userId']) || $_SESSION['userLogin'] === '' || (int) $_SESSION['userId'] <= 0) {
    header('Location: index.php');
    exit;
}
