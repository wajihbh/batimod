<?php
include("headerInfo.php"); 
include("includes/dbConnect.php");
$id=$_GET['id'];

$query="Update masse set titre='".utf8_encode(addslashes($_POST['titre']))."', descr='".utf8_encode(addslashes($_POST['desc']))."' where id='".$id."'";

$res=$pdo->query( $query);

if($res)
{
	header("Location: gestionProjets.php?err=succesAptPlanMasse");
	die();
}
else
{
	header("Location: gestionProjets.php?err=errorAptPlanMasse");
	die();
}

?>