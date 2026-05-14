<?php

declare(strict_types=1);

if (!isset($pdo) || !$pdo instanceof PDO) {
    require __DIR__ . '/includes/dbConnect.php';
}

$categ = isset($_GET['cat']) ? (int) $_GET['cat'] : 0;
if ($categ <= 0) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}

$h = static function (?string $s): string {
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};

try {
    $stmt = $pdo->prepare('SELECT label FROM categorie WHERE id = ? LIMIT 1');
    $stmt->execute([$categ]);
    $dataCateg = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}

if ($dataCateg === false || $dataCateg === null) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}

$label = batimod_utf8_encode((string) ($dataCateg['label'] ?? ''));
?>
<h2><?php echo $h($label); ?></h2>
<div id="block2">
<?php
try {
    $stmt2 = $pdo->prepare('SELECT id, titre, descr, img, type FROM projets WHERE categ = ? AND active = 1');
    $stmt2->execute([$categ]);
    $projets = $stmt2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}

if (count($projets) > 0) {
    $i = 0;
    $k = 1;
    echo '<article>';
    echo '<section id="' . $k . '">';

    $pagination = '<li ><a href="#' . $k . '" class="tab">' . $k . '</a></li>';
    foreach ($projets as $dataProj) {
        $i++;
        $titre = $h(batimod_utf8_encode((string) ($dataProj['titre'] ?? '')));
        $descr = $h(batimod_utf8_encode((string) ($dataProj['descr'] ?? '')));
        $img = $h((string) ($dataProj['img'] ?? ''));
        $pid = (int) ($dataProj['id'] ?? 0);
        echo '<div class="sous-block1"> <img class="img-sous-block1" src="images/' . $img . '" alt="" /> <font>' . $titre . '</font>
				<p class="style7">' . $descr . '<a class="lien" href="detailReference.php?id=' . $pid . '">Voir+</a></p>
			  </div>';

        if ($i % 3 === 0) {
            echo '</section>';
            $k++;
            $pagination .= '<li ><a href="#' . $k . '" class="tab">' . $k . '</a></li>';
            echo '<section id="' . $k . '">';
        }
    }
    echo '</section>
		        </article>
		        <div class="paginationTG">
				  <ul>
				    ' . $pagination . '
				  </ul>
			    </div>';
} else {
    echo '<div class="info">Aucun éléments sous cette catégorie</div>';
}

?>
