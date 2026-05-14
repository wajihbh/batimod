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

$mot = isset($_POST['rech']) ? trim((string) $_POST['rech']) : '';
if ($mot === '') {
    echo '<p>Veuillez saisir un terme de recherche.</p>';
} else {
    $like = '%' . $mot . '%';
    $stmt = mysqli_prepare($con, 'SELECT id, type, titre, descr FROM projets WHERE descr LIKE ?');
    if ($stmt === false) {
        echo '<p class="error">Un problème est survenu lors de la récupération des données.</p>';
        error_log('rstRecherche: prepare failed — ' . mysqli_error($con));
    } else {
        mysqli_stmt_bind_param($stmt, 's', $like);
        mysqli_stmt_execute($stmt);
        $requete = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if ($requete instanceof mysqli_result) {
            $nb_total = mysqli_num_rows($requete);
            if ($nb_total === 0) {
                echo '<p>Désolé, aucune page de ce site ne contient <b>' . htmlspecialchars($mot, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</b>...</p>';
            } else {
                echo '<p><b>' . (int) $nb_total . '</b> réponse(s) trouvée(s)</p>';
                while ($data = mysqli_fetch_assoc($requete)) {
                    if ((int) $data['type'] === 1) {
                        $url = 'detailReference.php?id=' . (int) $data['id'];
                    } else {
                        $url = 'projet-cours.php';
                    }
                    $titre = function_exists('mb_convert_encoding')
                        ? mb_convert_encoding((string) $data['titre'], 'UTF-8', 'ISO-8859-1')
                        : (string) $data['titre'];
                    $descr = function_exists('mb_convert_encoding')
                        ? mb_convert_encoding((string) $data['descr'], 'UTF-8', 'ISO-8859-1')
                        : (string) $data['descr'];
                    echo '<br><br><a href="' . htmlspecialchars($url, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '"><b>'
                        . htmlspecialchars($titre, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</b></a><br>'
                        . nl2br(htmlspecialchars($descr, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))
                        . '<br><small>' . htmlspecialchars($url, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</small><br>';
                }
                echo '<br><br>';
            }
            mysqli_free_result($requete);
        }
    }
}

mysqli_close($con);
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
