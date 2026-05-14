<?php 
$query="Select * from rubriques where categ='services' limit 1";
$res=$pdo->query( $query);
if($res)
{
	$data=$res->fetch(PDO::FETCH_ASSOC);
	?>
	<div id="contenu">
	  <h2><?php echo utf8_encode($data['titre']); ?></h2>
	  <p class="style6"><?php echo utf8_encode($data['descr']); ?></p>
	  <img class="img-presentation" src="images/service1.png" />
	  <img class="img-presentation" src="images/service3.jpg" />
	</div>
	<?php 
}
else
{
	?>
	<div id="contenu">
	  <h2>Nos Services</h2>
	  <div class="error">Erreur : impossible de récupérer les données</div>
	  <img class="img-presentation" src="images/service.png" /> 
	</div>
	<?php
}
?>
