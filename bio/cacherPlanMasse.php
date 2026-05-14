<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="update masse set active='0' where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
	header("Location: gererPlanMasse.php?id=".$_GET['proj']."&err=succesCacherPlanMasse");
	die();
}
else
{
	header("Location: gererPlanMasse.php?id=".$_GET['proj']."&err=errorCacherPlanMasse");
	die();
}

?>