<?php

declare(strict_types=1);

include 'config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    exit('Invalid id');
}

$stmt = mysqli_prepare($con, 'DELETE FROM `categorie` WHERE `id` = ?');
if ($stmt === false) {
    die(mysqli_error($con));
}
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

echo mysqli_affected_rows($con) ? 'Row deleted.<br /> ' : 'Nothing deleted.<br /> ';

?>
<a href="list.php">Back To Listing</a>
