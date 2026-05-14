<?php

declare(strict_types=1);

require __DIR__ . '/config.php';

if (isset($_POST['submitted'])) {
    $label = isset($_POST['label']) ? (string) $_POST['label'] : '';
    try {
        $stmt = $pdo->prepare('INSERT INTO `categorie` (`label`) VALUES (?)');
        $stmt->execute([$label]);
        echo 'Added row.<br />';
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
    echo "<a href='list.php'>Back To Listing</a>";
}
?>
<form action="" method="post">
<p><b>Label:</b><br /><input type="text" name="label"/></p>
<p><input type="submit" value="Add Row" /><input type="hidden" value="1" name="submitted" /></p>
</form>
