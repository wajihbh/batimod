<?php

declare(strict_types=1);

if (!isset($pdo) || !$pdo instanceof PDO) {
    require __DIR__ . '/includes/dbConnect.php';
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}

try {
    $stmt = $pdo->prepare('SELECT titre, descr, img FROM projets WHERE id = ? AND active = 1 LIMIT 1');
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}

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
