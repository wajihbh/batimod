<?php 
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$query="update masse set active='1' where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
	header("Location: gererPlanMasse.php?id=".$_GET['proj']."&err=succesAffPlanMasse");
	die();
}
else
{
	header("Location: gererPlanMasse.php?id=".$_GET['proj']."&err=errorAffPlanMasse");
	die();
}

?>