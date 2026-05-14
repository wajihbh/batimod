<?php 
$query="Select * from rubriques where categ='home' limit 1";
$res=$pdo->query( $query);
if($res)
{
$data=$res->fetch(PDO::FETCH_ASSOC);
?>

<div id="contenu">
  <h2><?php echo utf8_encode($data['titre']);?></h2>
  <p class="style1"> <?php echo utf8_encode(substr($data['descr'],0,600));?> ... <a class="lien" href="presentation.php">Lire la suite</a> </p>
</div>

<?php 
}
else
{
echo '<div class="error">Erreur : impossible de r�cup�rer les donn�es</div> ';
}
?>