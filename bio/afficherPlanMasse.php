<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="update masse set active='1' where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query);
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
mysqli_close($con);
?>