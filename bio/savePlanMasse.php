<?php
include("headerInfo.php"); 
include("includes/dbConnect.php");
$id=$_GET['id'];

$query="Update masse set titre='".batimod_utf8_encode(addslashes($_POST['titre']))."', descr='".batimod_utf8_encode(addslashes($_POST['desc']))."' where id='".$id."'";

$res=mysqli_query($con, $query) or die (mysqli_error($con));

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
mysqli_close($con);
?>