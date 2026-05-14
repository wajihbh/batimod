<?php
include("headerInfo.php"); 
include("includes/dbConnect.php");
$id=$_GET['id'];

$query="Update gallerie set titre='".batimod_utf8_encode(addslashes($_POST['titre']))."', descr='".batimod_utf8_encode(addslashes($_POST['desc']))."' where id='".$id."'";

$res=mysqli_query($con, $query) or die (mysqli_error($con));

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
mysqli_close($con);
?>