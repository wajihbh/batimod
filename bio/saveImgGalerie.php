<?php
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$id=$_GET['id'];

$query="Update gallerie set titre='".batimod_utf8_encode(addslashes($_POST['titre']))."', descr='".batimod_utf8_encode(addslashes($_POST['desc']))."' where id='".$id."'";

$res=$pdo->query( $query);

if($res)
{
	header("Location: gestionProjets.php?err=succesAptImgGal");
	die();
}
else
{
	header("Location: gestionProjets.php?err=errorAptImgGal");
	die();
}

?>