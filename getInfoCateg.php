<?php

declare(strict_types=1);

if (!isset($con) || !$con instanceof mysqli) {
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

$stmt = mysqli_prepare($con, 'SELECT label FROM categorie WHERE id = ? LIMIT 1');
if ($stmt === false) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}
mysqli_stmt_bind_param($stmt, 'i', $categ);
mysqli_stmt_execute($stmt);
$resCateg = mysqli_stmt_get_result($stmt);
$dataCateg = $resCateg ? mysqli_fetch_assoc($resCateg) : false;
mysqli_stmt_close($stmt);

if ($dataCateg === false || $dataCateg === null) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}

$label = batimod_utf8_encode((string) ($dataCateg['label'] ?? ''));
?>
<h2><?php echo $h($label); ?></h2>
<div id="block2">
<?php
$stmt2 = mysqli_prepare(
    $con,
    'SELECT id, titre, descr, img, type FROM projets WHERE categ = ? AND active = 1'
);
if ($stmt2 === false) {
    echo '<div class="error">Aucune information trouvée</div>';

    return;
}
mysqli_stmt_bind_param($stmt2, 'i', $categ);
mysqli_stmt_execute($stmt2);
$resProj = mysqli_stmt_get_result($stmt2);
mysqli_stmt_close($stmt2);

if ($resProj && mysqli_num_rows($resProj) > 0) {
    $i = 0;
    $k = 1;
    echo '<article>';
    echo '<section id="' . $k . '">';

    $pagination = '<li ><a href="#' . $k . '" class="tab">' . $k . '</a></li>';
    while ($dataProj = mysqli_fetch_assoc($resProj)) {
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
