<?php

declare(strict_types=1);

require __DIR__ . '/config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    exit('Invalid id');
}

$h = static function (?string $s): string {
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};

if (isset($_POST['submitted'])) {
    $label = isset($_POST['label']) ? (string) $_POST['label'] : '';
    try {
        $stmt = $pdo->prepare('UPDATE `categorie` SET `label` = ? WHERE `id` = ? LIMIT 1');
        $stmt->execute([$label, $id]);
        echo $stmt->rowCount() ? 'Edited row.<br />' : 'Nothing changed. <br />';
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
    echo "<a href='list.php'>Back To Listing</a>";
}

try {
    $stmt = $pdo->prepare('SELECT `label` FROM `categorie` WHERE `id` = ? LIMIT 1');
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    exit($e->getMessage());
}

if ($row === false || $row === null) {
    exit('Row not found');
}

$labelVal = $h((string) ($row['label'] ?? ''));
?>
<form action="" method="post">
<p><b>Label:</b><br /><input type="text" name="label" value="<?php echo $labelVal; ?>" /></p>
<p><input type="submit" value="Edit Row" /><input type="hidden" value="1" name="submitted" /></p>
</form>
