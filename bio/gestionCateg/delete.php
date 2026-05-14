<?php

declare(strict_types=1);

require __DIR__ . '/config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    exit('Invalid id');
}

$stmt = mysqli_prepare($con, 'DELETE FROM `categorie` WHERE `id` = ? LIMIT 1');
if ($stmt === false) {
    exit(mysqli_error($con));
}
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
echo mysqli_stmt_affected_rows($stmt) ? 'Row deleted.<br /> ' : 'Nothing deleted.<br /> ';
mysqli_stmt_close($stmt);
?>
<a href='list.php'>Back To Listing</a>
