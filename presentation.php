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
  <?php 
    include('includes/dbConnect.php'); 
    include('header.php'); 
    ?>
  <div id="content">
     <?php 	include('menu.php'); ?>
    <div id="contenu">
      <h2>Présentation</h2>
      <p  class="style6"> <strong>Batimod   Société de Bâtiment Moderne</strong><br />
        <?php include('getTextPresentation.php'); ?>
      </p>
      <img class="img-presentation" src="images/home1.jpg" /> <img class="img-presentation" src="images/home2.jpg" /> <img class="img-presentation" src="images/presentation3.png" /> </div>
    <div id="block">
      <?php
      include('boiteProjetEnCours.php'); 
      include('boiteNosReferences.php'); 
      include('boiteConsultation.php');
	  ?>
    </div>
  </div>
  <br clear="all" />
  <?php include('footer.php');  ?>
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
