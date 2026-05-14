<?php
include("headerInfo.php");
require_once __DIR__ . '/../includes/dbConnect.php';
$query="Update categorie set label='".addslashes(utf8_decode($_POST['lbl']))."' where id='".$_GET['id']."' limit 1";
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
