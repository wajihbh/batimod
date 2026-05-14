<?php 
$query="Select * from rubriques where categ='home' limit 1";
$res=$pdo->query( $query);
if($res)
{
	$data=$res->fetch(PDO::FETCH_ASSOC);
	echo utf8_encode($data['descr']);
}
else
{
echo '<div class="error">Erreur : impossible de r�cup�rer les donn�es</div> ';
}
?>

