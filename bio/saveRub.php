<?php
include("headerInfo.php");
include("includes/dbConnect.php");
$query="Update rubriques set descr='".addslashes(utf8_decode($_POST['descr']))."' where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);

if(!$res)
{
	header("Location: gestionRubrique.php?err=majRubError");
	die();
}
else
{
	header("Location: gestionRubrique.php?err=majRubSucess");
	die();
}
?>
