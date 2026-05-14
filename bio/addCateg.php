<?php
include("headerInfo.php");
include("includes/dbConnect.php");
$query="insert into categorie  (label) values ('".addslashes(utf8_decode($_POST['lbl']))."')";
$res=$pdo->query( $query);

if(!$res)
{
	header("Location: gestionCategorie.php?err=majCatError");
	die();
}
else
{
	header("Location: gestionCategorie.php?err=majCatSucess");
	die();
}
?>
