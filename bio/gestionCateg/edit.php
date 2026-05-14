<?php

declare(strict_types=1);

include 'config.php';

if (!isset($_GET['id'])) {
    exit('Missing id');
}

$id = (int) $_GET['id'];
if ($id <= 0) {
    exit('Invalid id');
}

$error = '';

if (isset($_POST['submitted'])) {
    $label = isset($_POST['label']) ? trim((string) $_POST['label']) : '';
    if ($label === '') {
        $error = 'Label required.';
    } else {
        $stmt = mysqli_prepare($con, 'UPDATE `categorie` SET `label` = ? WHERE `id` = ?');
        if ($stmt === false) {
            die(mysqli_error($con));
        }
        mysqli_stmt_bind_param($stmt, 'si', $label, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('Location: list.php');
        exit;
    }
}

$stmt = mysqli_prepare($con, 'SELECT * FROM `categorie` WHERE `id` = ? LIMIT 1');
if ($stmt === false) {
    die(mysqli_error($con));
}
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);
$row = $result ? mysqli_fetch_array($result, MYSQLI_ASSOC) : null;
if ($row === null) {
    exit('Row not found');
}
mysqli_free_result($result);

?>
<?php if (!empty($error)) { ?>
<p style="color:red"><?php echo htmlspecialchars($error, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></p>
<?php } ?>
<form action="" method="POST">
<p><b>Label:</b><br /><input type="text" name="label" value="<?php echo htmlspecialchars((string) $row['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" /></p>
<p><input type="submit" value="Edit Row" /><input type="hidden" value="1" name="submitted" /></p>
</form>
<p><a href="list.php">Back To Listing</a></p>
