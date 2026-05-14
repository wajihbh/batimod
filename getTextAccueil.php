<?php 
$query="Select * from rubriques where categ='home' limit 1";
$res=mysqli_query($con, $query);
if($res)
{
$data=mysqli_fetch_assoc($res);
?>

<div id="contenu">
  <h2><?php echo batimod_utf8_encode($data['titre']);?></h2>
  <p class="style1"> <?php echo batimod_utf8_encode(substr($data['descr'],0,600));?> ... <a class="lien" href="presentation.php">Lire la suite</a> </p>
</div>

<?php 
}
else
{
echo '<div class="error">Erreur : impossible de r�cup�rer les donn�es</div> ';
}
?>