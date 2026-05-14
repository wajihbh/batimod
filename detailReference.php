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
      <?php include('rightMenu.php');  ?>
      <?php include('getInfoProjet.php');  ?>
    </div>
    <div id="block">
      <?php include('boiteProjetEnCours.php'); ?>
      <?php include('boiteNosReferences.php'); ?>
      <?php include('boiteConsultation.php'); ?>
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
