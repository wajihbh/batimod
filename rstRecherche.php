<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BATIMOD</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/960.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-3.5.2.min.js"></script>
<script type="text/javascript" src="sliding_effect.js"></script>
<script type="text/javascript" src="js/min.js"></script>
<script  type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="css/styles.css" type="text/css" />

	<?php include __DIR__ . '/includes/head_responsive.php'; ?>
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

if (!isset($pdo) || !$pdo instanceof PDO) {
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
        try {
            $stmt = $pdo->prepare(
                'SELECT id, titre, descr, type FROM projets WHERE descr LIKE CONCAT(\'%\', ?, \'%\')'
            );
            $stmt->execute([$motRaw]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '<p>Erreur lors de la recherche.</p>';
            $rows = [];
        }

        $h = static function (?string $s): string {
            return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        };
        $motDisp = $h($motRaw);

        if (count($rows) > 0) {
            $nb_total = count($rows);
            echo '<b>' . $nb_total . '</b> réponse(s) trouvée(s) pour <b>' . $motDisp . '</b><br>';

            foreach ($rows as $data) {
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
