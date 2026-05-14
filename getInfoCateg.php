<?php

declare(strict_types=1);

$categRaw = isset($_GET['cat']) ? trim((string) $_GET['cat']) : '';
$categ = (int) $categRaw;
if ($categ <= 0 || (string) $categ !== $categRaw) {
    echo '<h2>Catégorie invalide</h2><div id="block2"></div>';
    return;
}

$stmtC = mysqli_prepare($con, 'SELECT label FROM categorie WHERE id = ? LIMIT 1');
if ($stmtC === false) {
    echo '<div class="error">Erreur technique.</div>';
    return;
}
mysqli_stmt_bind_param($stmtC, 'i', $categ);
mysqli_stmt_execute($stmtC);
$resCateg = mysqli_stmt_get_result($stmtC);
mysqli_stmt_close($stmtC);
$dataCateg = $resCateg ? mysqli_fetch_assoc($resCateg) : null;
if ($resCateg instanceof mysqli_result) {
    mysqli_free_result($resCateg);
}

if ($dataCateg === null || !isset($dataCateg['label'])) {
    echo '<h2>Catégorie introuvable</h2><div id="block2"></div>';
    return;
}

$label = function_exists('mb_convert_encoding')
    ? mb_convert_encoding((string) $dataCateg['label'], 'UTF-8', 'ISO-8859-1')
    : (string) $dataCateg['label'];
?>
<h2><?php echo htmlspecialchars($label, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h2>
<div id="block2">
<?php
$stmtP = mysqli_prepare($con, 'SELECT * FROM projets WHERE categ = ? AND active = 1');
if ($stmtP === false) {
    echo '<div class="error">Erreur technique.</div>';
    return;
}
mysqli_stmt_bind_param($stmtP, 'i', $categ);
mysqli_stmt_execute($stmtP);
$resProj = mysqli_stmt_get_result($stmtP);
mysqli_stmt_close($stmtP);

if ($resProj instanceof mysqli_result) {
    if (mysqli_num_rows($resProj) > 0) {
        $i = 0;
        $k = 1;
        echo '<article>';
        echo '<section id="' . $k . '">';
        $pagination = '<li ><a href="#' . $k . '" class="tab">' . $k . '</a></li>';
        while ($dataProj = mysqli_fetch_assoc($resProj)) {
            $i++;
            $titre = function_exists('mb_convert_encoding')
                ? mb_convert_encoding((string) $dataProj['titre'], 'UTF-8', 'ISO-8859-1')
                : (string) $dataProj['titre'];
            $descr = function_exists('mb_convert_encoding')
                ? mb_convert_encoding((string) $dataProj['descr'], 'UTF-8', 'ISO-8859-1')
                : (string) $dataProj['descr'];
            $img = htmlspecialchars((string) $dataProj['img'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            $pid = (int) $dataProj['id'];
            echo '<div class="sous-block1"> <img class="img-sous-block1" src="images/' . $img . '" /> <font>'
                . htmlspecialchars($titre, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</font>
				<p class="style7">' . htmlspecialchars($descr, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
                . '<a class="lien" href="detailReference.php?id=' . $pid . '">Voir+</a></p>
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
    mysqli_free_result($resProj);
} else {
    echo '<div class="error">Aucune information trouvée</div> ';
}
?>
    </div>
