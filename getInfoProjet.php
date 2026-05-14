<?php

declare(strict_types=1);

$idRaw = isset($_GET['id']) ? trim((string) $_GET['id']) : '';
$id = (int) $idRaw;
if ($id <= 0 || (string) $id !== $idRaw) {
    echo '<div class="error">Référence invalide</div>';
    return;
}

$stmt = mysqli_prepare($con, 'SELECT * FROM projets WHERE id = ? AND active = 1 LIMIT 1');
if ($stmt === false) {
    echo '<div class="error">Aucune information trouvée</div>';
    return;
}
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

$data = $res ? mysqli_fetch_assoc($res) : null;
if ($res instanceof mysqli_result) {
    mysqli_free_result($res);
}

if ($data === null) {
    echo '<div class="error">Aucune information trouvée</div>';
    return;
}

$titre = function_exists('mb_convert_encoding')
    ? mb_convert_encoding((string) $data['titre'], 'UTF-8', 'ISO-8859-1')
    : (string) $data['titre'];
$descr = function_exists('mb_convert_encoding')
    ? mb_convert_encoding((string) $data['descr'], 'UTF-8', 'ISO-8859-1')
    : (string) $data['descr'];
$img = htmlspecialchars((string) $data['img'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
	<div id="etablissement">
	<h2><?php echo htmlspecialchars($titre, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h2>
	<p><?php echo nl2br(htmlspecialchars($descr, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')); ?></p>
	<img class="img-presentation" src="images/<?php echo $img; ?>" />
	</div>
