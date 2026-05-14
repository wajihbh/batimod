<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BATIMOD</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/960.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="sliding_effect.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/min.js"></script>
<script  type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>
<body>
</div>
<div id="page">
  <?php include('includes/dbConnect.php'); ?>
  <?php include('header.php'); ?>
  <div id="content">
    <?php include('menu.php'); ?>
    <div id="contenu">
      <h2>Résultat de la recherche</h2>
      <div id="rst-recherche">
      
      <?php

declare(strict_types=1);

if (!isset($con) || !$con instanceof mysqli) {
    require __DIR__ . '/includes/dbConnect.php';
}

$limit = 2;
$script_name = 'rstRecherche.php';
$et_ou = 'or';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['rech'])) {
    echo '<p>Veuillez utiliser le formulaire de recherche.</p>';
} else {
    $motRaw = trim((string) $_POST['rech']);
    if ($motRaw === '') {
        echo '<p>Terme de recherche vide.</p>';
    } else {
        $stmt = mysqli_prepare(
            $con,
            'SELECT id, titre, descr, type FROM projets WHERE descr LIKE CONCAT(\'%\', ?, \'%\')'
        );
        if ($stmt === false) {
            echo '<p>Erreur lors de la recherche.</p>';
        } else {
            mysqli_stmt_bind_param($stmt, 's', $motRaw);
            mysqli_stmt_execute($stmt);
            $requete = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);

            $h = static function (?string $s): string {
                return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            };
            $motDisp = $h($motRaw);

            if ($requete && mysqli_num_rows($requete) > 0) {
                $nb_total = mysqli_num_rows($requete);
                echo '<b>' . (int) $nb_total . '</b> réponse(s) trouvée(s) pour <b>' . $motDisp . '</b><br>';

                while ($data = mysqli_fetch_assoc($requete)) {
                    $type = (int) ($data['type'] ?? 0);
                    $url = $type === 1
                        ? 'detailReference.php?id=' . (int) ($data['id'] ?? 0)
                        : 'projet-cours.php';
                    $titre = $h(batimod_utf8_encode((string) ($data['titre'] ?? '')));
                    $descr = $h(batimod_utf8_encode((string) ($data['descr'] ?? '')));
                    $urlDisp = $h($url);
                    echo '<br><br><a href="' . $h($url) . '"><b>' . $titre . '</b></a><br>' . $descr . '<br><font size="1">' . $urlDisp . '</font><br>';
                }
                echo '<br><br>';
            } else {
                echo 'Désolé, aucune page de ce site ne contient <b>' . $motDisp . '</b>...';
            }
        }
    }
}

?>
       
      </div>
      </div>
  </div>
</div>
</div>
<br clear="all" />
<?php include('footer.php'); ?>
</div>
</div>
<script type="text/javascript">
$('.ppt li:gt(0)').hide();
$('.ppt li:last').addClass('last');
var cur = $('.ppt li:first');

function animate() {
	cur.fadeOut( 600 );
	if ( cur.attr('class') == 'last' )
		cur = $('.ppt li:first');
	else
		cur = cur.next();
	cur.fadeIn( 600 );
}


$(function() {
	setInterval( "animate()", 2500 );
} );
</script>
</body>
</html>
