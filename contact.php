<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BATIMOD</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/960.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.4.1.min.js"></script>
<script type="text/javascript" src="sliding_effect.js"></script>
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
      <h2>Contact</h2>
      <div id="left-contact">
        <div class="contact-titre"> Nos coordonnées </div>
        <p> Batimod - 1, Rue Docteur Abderrahmen Memi Borj Louzir- 2073 Ariana- Tunis - Tunisie<br />
          <br />
          <b>Tél : </b></p>
        <div class="contact-tel">+216 71.695.608<br />
          +216 71.695.433<br />
          +216 71.695.611</div>
        <p><b>Fax :</b></p>
        <div class="contact-tel"> +216 71.695.565 </div>
        <p><b>Email :</b></p>
        <div class="contact-tel"><a href="mailto:contact@batimod.com" class="txtMail">contact@batimod.com</a> </div>
        </p>
      </div>
      <div id="right-contact">
        <div class="contact-titre"> Nous contacter </div>
        <div class="contact_us_form_area">
        <form action="sendContact.php" method="post" name="maform" >
          </div>
          <div class="name_area">
            <div class="input_area">
              <div class="filedest"> <span style="font-size:13px">Nom<em style="color:#ff0000"> * </em></span>
                <label>
                <input type="text" name="nom"    id="nom"/>
                </label>
              </div>
            </div>
            <div class="input_area">
              <div class="filedest"> <span style="font-size:13px">Prenom<em style="color:#ff0000"> * </em></span>
                <label>
                <input type="text" name="prenom"    id="prenom"/>
                </label>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="name_area">
          <div class="input_area">
            <div class="filedest"> <span style="font-size:13px">Tel<em style="color:#ff0000"> * </em></span>
              <label>
              <input type="text" name="tel"  id="tell"/>
              </label>
            </div>
          </div>
          <div class="name_area">
            <div class="input_area">
              <div class="filedest"> <span style="font-size:13px">Email </span>
                <label>
                <input type="text" name="mail"   id="mail"/>
                </label>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="name_area">
            <div class="input_areaa">
              <div class="filedest"> <span style="font-size:13px">Message <em style="color:#ff0000"> * </em></span>
                <textarea name="comments"  id="comments"></textarea>
              </div>
            </div>
            <br clear="all">
          </div>
          <br />
          <em style="color:#BD0C08; margin-left:12px; margin-top:10px">champs obligatoires *</em>
          <div class="name_area">
            <input type="button" value="Envoyer" class="envoyer_b"  onclick="return verifForm()"/>
            <input type="reset" value="Annuler" class="annuler_b" />
          </div>
        </form>
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
