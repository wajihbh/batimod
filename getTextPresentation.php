<?php 
$query="Select * from rubriques where categ='home' limit 1";
$res=mysqli_query($con, $query);
if($res)
{
	$data=mysqli_fetch_assoc($res);
	echo utf8_encode($data['descr']);
}
else
{
echo '<div class="error">Erreur : impossible de r�cup�rer les donn�es</div> ';
}
?>

