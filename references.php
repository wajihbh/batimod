<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BATIMOD</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/960.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="sliding_effect.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/min.js"></script>
<script  type="text/javascript" src="js/script.js"></script>
</head>
<body>
</div>
<div id="page">
  <?php include('includes/dbConnect.php'); ?>
  <?php include('header.php'); ?>
  <div id="content">
    <?php include('menu.php'); ?>
    <h2>Nos Références</h2>
    <div id="block">
      
      
      <?php
	  $query="select * from projets where type='1' order by id desc";
	  try {
		  $stmt = $pdo->query($query);
		  $rows = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
	  } catch (PDOException $e) {
		  $rows = [];
	  }
	  if(count($rows) > 0)
	  {
		  $i=0;
		  $k=1;
		  echo '<article>';
		  echo '<section id="'.$k.'">';
		  $tot=count($rows);
		  $pagination='<li ><a href="#1" class="tab">1</a></li>';
		  foreach($rows as $data)
		  {
			  $i++;
			  echo '<div class="sous-block1"> <img class="img-sous-block1" src="images/'.$data['img'].'" /> <font>'.utf8_encode($data['titre']).'</font>
				<p class="style7">'.utf8_encode($data['descr']).'...<a class="lien" href="detailReference.php?id='.$data['id'].'">Voir+</a></p>
			  </div>';
			  
			  if($i%8==0)
			  {
				  echo '</section>';
				  $k++;
				  $pagination.='<li ><a href="#'.$k.'" class="tab">'.$k.'</a></li>';  
				  echo '<section id="'.$k.'">';
			  }
		  }
		  echo '</section>
		        </article>
		        <div class="paginationTG">
				  <ul>
				    '.$pagination.'
				  </ul>
			    </div>';
	  }
	  else
	  {
	  	echo 'Aucun élément sélectionnée';
	  }
	  ?>
        
         <!--
        <section id="2">
          <div style="margin-right:10px; margin-left:11px;" class="sous-block1"> <img class="img-sous-block1" src="images/imen.png" /> <font>Résidence Imen</font>
            <p class="style7">Résidence Imen : Nous sommes à la hauteur de toutes nos engagements...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Mahou.png" /> <font>Mahou</font>
            <p class="style7">Immobiliére Mahou : Architecture moderne ou traditionnelle, on agit bien à la mesure et dans les délais imposés...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Socodim.png" /> <font>Socodim</font>
            <p class="style7">Immobilière Socodim : Mème au coeur du centre ville, nous présentons les meilleurs stratégies de pilotage des chantiers...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div  class="sous-block1"> <img class="img-sous-block1" src="images/Medina.png" /> <font>Medina</font>
            <p class="style7">Immobilière Medina Résidence Ibn Zaydoun : Des aménagements de petites, moyennes ou grandes  superficie...<a class="lien" href="">Voir+</a></p>
          </div>
          <div style="margin-right:10px; margin-left:11px;" class="sous-block1"> <img class="img-sous-block1" src="images/Simpar.png" /> <font>Sivia Simpar</font>
            <p class="style7">Immobilière Sivia Simpar Résidence Orange : Un véritable lieu d'habitation qui résume l'aspect de nos travaux...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/industrie.png" /> <font>Local du Ministére</font>
            <p class="style7">Local du Ministére de l'industrie : Complexe d'habitation ou administratif, on garantit toujours le respect du référentiel...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/nozha.png" /> <font>Nozha</font>
            <p class="style7">Immobilière Nozha Montplaisir : Nos équipes sont prèt à batir tout les architectures avec des normes...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div  class="sous-block1"> <img class="img-sous-block1" src="images/ministere.png" /> <font>Ministére de l'industrie</font>
            <p class="style7">Ministère de l'Industrie de l'Energie et Des petites et Moyennes Entreprises...<a class="lien" href="projet-cours.php">Voir+</a></p>
          </div>
        </section>
        <section id="3">
          <div style="margin-right:10px; margin-left:11px;" class="sous-block1"> <img class="img-sous-block1" src="images/ennozha.png" /> <font>Immobilière Ennozha</font>
            <p class="style7">Immobilière Ennozha Complexe Administratif : Des batiments de haute qualités et des architectures à la page...<a class="lien" href="sous-reference.php">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/nozha2.png" /> <font>Nozha</font>
            <p class="style7">Immobilière Nozha : On tient à réaliser tout les projets sans alourdir les coùts...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/palais.png" /> <font>Le petit Palais</font>
            <p class="style7">Immeuble le petit Palais Local Tunisie Télécom, Agence Borj Louzir : Au coeurs de l'Ariana Ville...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div  class="sous-block1"> <img class="img-sous-block1" src="images/autoroutes.png" /> <font>Tunisie autoroutes</font>
            <p class="style7">Local de la direction Tunisie Autoroutes : On attire l'attention de la majorité des établissements étatique...<a class="lien" href="projet-cours.php">Voir+</a></p>
          </div>
          <div style="margin-right:10px; margin-left:11px;" class="sous-block1"> <img class="img-sous-block1" src="images/css.png" /> <font>CNSS</font>
            <p class="style7">Immobilière le petit Palais Local de la CNSS : Des batiments de hautes qualités qui répondes aux normes exigés...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Safsaf.png" /> <font>Safsaf</font>
            <p class="style7">Peut importe le lieu des travaux et la complexité des architectures toujours on assure la bonne éxécution de nos projets...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/dangereuses.png" /> <font>Centre des dangereuses</font>
            <p class="style7">Centre des dangereuses blessures et brûlures : En regard des batiments de santé...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div  class="sous-block1"> <img class="img-sous-block1" src="images/Hoiptal.png" /> <font>Hoiptal régional Ariana</font>
            <p class="style7">Hoiptal régional Ariana...<a class="lien" href="projet-cours.php">Voir+</a></p>
          </div>
        </section>
        <section id="4">
          <div style="margin-right:10px; margin-left:11px;" class="sous-block1"> <img class="img-sous-block1" src="images/Hoiptal2.png" /> <font>Hopital Régional Ben Arous</font>
            <p class="style7">Hopital Régional Ben Arous...<a class="lien" href="sous-reference.php">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Hoiptal3.png" /> <font>Hopital Habib Thameur</font>
            <p class="style7">Hopital Habib Thameur...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Zaydoun.png" /> <font>Ibn Zaydoun - Manouba</font>
            <p class="style7">Restaurant universitaire Ibn Zaydoun - Manouba...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div  class="sous-block1"> <img class="img-sous-block1" src="images/Thabet.png" /> <font>Sidi Thabet</font>
            <p class="style7">Lycée National de recherche et d'analyse physique chimique  -  Sidi Thabet...<a class="lien" href="projet-cours.php">Voir+</a></p>
          </div>
          <div style="margin-right:10px; margin-left:11px;" class="sous-block1"> <img class="img-sous-block1" src="images/Mourouj.png" /> <font>El Mourouj 3</font>
            <p class="style7">Foyer Universitaire - El Mourouj 3...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Sina.png" /> <font>Cartier Ibn Sina</font>
            <p class="style7">Foyer Universitaire - Cartier Ibn Sina...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Mornag.png" /> <font>Mornag</font>
            <p class="style7">Lycée Abou Kacem Chabbi - Mornag...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div  class="sous-block1"> <img class="img-sous-block1" src="images/Ariana.png" /> <font>Ariana</font>
            <p class="style7">Conservation foncière - Ariana...<a class="lien" href="projet-cours.php">Voir+</a></p>
          </div>
        </section>
        <section id="5">
          <div style="margin-right:10px; margin-left:11px;" class="sous-block1"> <img class="img-sous-block1" src="images/Nabeul.png" /> <font>Nabeul</font>
            <p class="style7">Cours d'appel de Nabeul...<a class="lien" href="sous-reference.php">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Omar.png" /> <font>Diar Omar</font>
            <p class="style7">Immeuble Diar Omar...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/voitures.png" /> <font>Société des voitures</font>
            <p class="style7">Complexe directionnel de la Société des voitures et instruments...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div  class="sous-block1"> <img class="img-sous-block1" src="images/Essoukna.png" /> <font>Essoukna</font>
            <p class="style7">Complexe à usage d'habitation et de commerce - Immobilière Essoukna...<a class="lien" href="projet-cours.php">Voir+</a></p>
          </div>
          <div style="margin-right:10px; margin-left:11px;" class="sous-block1"> <img class="img-sous-block1" src="images/Fawanis.png" /> <font>Immeuble Fawanis</font>
            <p class="style7">Immeuble Fawanis...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Soukra.png" /> <font>Soukra</font>
            <p class="style7">Salle Couverte   -  Soukra...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div style="margin-right:10px;" class="sous-block1"> <img class="img-sous-block1" src="images/Soukra2.png" /> <font>Soukra</font>
            <p class="style7">Stade Gazonné  -  Soukra...<a class="lien" href="#">Voir+</a></p>
          </div>
          <div  class="sous-block1"> <img class="img-sous-block1" src="images/Manouba1.png" /> <font>Manouba</font>
            <p class="style7">Salle Couverte Manouba...<a class="lien" href="projet-cours.php">Voir+</a></p>
          </div>
        </section>
        <section id="6">
          <div  class="sous-block1"> <img class="img-sous-block1" src="images/Manouba2.png" /> <font>Manouba</font>
            <p class="style7">Stade Gazonné  -  Manouba...<a class="lien" href="projet-cours.php">Voir+</a></p>
          </div>
        </section> -->
      
      
    </div>
    <div id="block">
      <?php 
	  include('boiteProjetEnCours.php'); 
      include('boiteNosReferences.php'); 
      include('boiteConsultation.php'); 
	  ?>
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
