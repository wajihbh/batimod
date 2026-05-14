<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="Delete from masse where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query);
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
mysqli_close($con);
?>