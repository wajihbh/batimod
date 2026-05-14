<?php 
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$query="Delete from masse where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
	header("Location: gererPlanMasse.php?id=".$_GET['proj']."&err=succesDelPlanMasse");
	die();
}
else
{
	header("Location: gererPlanMasse.php?id=".$_GET['proj']."&err=errorDelPlanMasse");
	die();
}

?>