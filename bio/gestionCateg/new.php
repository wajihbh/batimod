<?php

declare(strict_types=1);

include 'config.php';

$error = '';

if (isset($_POST['submitted'])) {
    $label = isset($_POST['label']) ? trim((string) $_POST['label']) : '';
    if ($label === '') {
        $error = 'Label required.';
    } else {
        $stmt = mysqli_prepare($con, 'INSERT INTO `categorie` (`label`) VALUES (?)');
        if ($stmt === false) {
            die(mysqli_error($con));
        }
        mysqli_stmt_bind_param($stmt, 's', $label);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('Location: list.php');
        exit;
    }
}

?>
<?php if ($error !== '') { ?>
<p style="color:red"><?php echo htmlspecialchars($error, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></p>
<?php } ?>
<form action="" method="POST">
<p><b>Label:</b><br /><input type="text" name="label" /></p>
<p><input type="submit" value="Add Row" /><input type="hidden" value="1" name="submitted" /></p>
</form>
<p><a href="list.php">Back To Listing</a></p>
