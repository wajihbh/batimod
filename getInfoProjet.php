<?php

declare(strict_types=1);

if (!isset($con) || !$con instanceof mysqli) {
    require __DIR__ . '/includes/dbConnect.php';
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}

$stmt = mysqli_prepare(
    $con,
    'SELECT titre, descr, img FROM projets WHERE id = ? AND active = 1 LIMIT 1'
);
if ($stmt === false) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = $result ? mysqli_fetch_assoc($result) : false;
mysqli_stmt_close($stmt);

if ($data === false || $data === null) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}

$h = static function (?string $s): string {
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};

$titre = batimod_utf8_encode((string) ($data['titre'] ?? ''));
$descr = batimod_utf8_encode((string) ($data['descr'] ?? ''));
$img = $h((string) ($data['img'] ?? ''));
?>
<div id="etablissement">
<h2><?php echo $h($titre); ?></h2>
<p><?php echo $h($descr); ?></p>
<img class="img-presentation" src="images/<?php echo $img; ?>" alt="" />
</div>
