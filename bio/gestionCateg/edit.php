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
    $stmt = mysqli_prepare($con, 'UPDATE `categorie` SET `label` = ? WHERE `id` = ? LIMIT 1');
    if ($stmt === false) {
        exit(mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, 'si', $label, $id);
    mysqli_stmt_execute($stmt);
    echo mysqli_stmt_affected_rows($stmt) ? 'Edited row.<br />' : 'Nothing changed. <br />';
    mysqli_stmt_close($stmt);
    echo "<a href='list.php'>Back To Listing</a>";
}

$stmt = mysqli_prepare($con, 'SELECT `label` FROM `categorie` WHERE `id` = ? LIMIT 1');
if ($stmt === false) {
    exit(mysqli_error($con));
}
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = $res ? mysqli_fetch_assoc($res) : null;
mysqli_stmt_close($stmt);
if ($row === null) {
    exit('Row not found');
}

$labelVal = $h((string) ($row['label'] ?? ''));
?>
<form action="" method="post">
<p><b>Label:</b><br /><input type="text" name="label" value="<?php echo $labelVal; ?>" /></p>
<p><input type="submit" value="Edit Row" /><input type="hidden" value="1" name="submitted" /></p>
</form>
