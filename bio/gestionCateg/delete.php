<?php

declare(strict_types=1);

require __DIR__ . '/config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    exit('Invalid id');
}

try {
    $stmt = $pdo->prepare('DELETE FROM `categorie` WHERE `id` = ? LIMIT 1');
    $stmt->execute([$id]);
    echo $stmt->rowCount() ? 'Row deleted.<br /> ' : 'Nothing deleted.<br /> ';
} catch (PDOException $e) {
    exit($e->getMessage());
}
?>
<a href='list.php'>Back To Listing</a>
