<?php
include("headerInfo.php");
include("includes/dbConnect.php");
$query="Update rubriques set descr='".addslashes(batimod_utf8_decode($_POST['descr']))."' where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query) or die (mysqli_error($con));
mysqli_close($con);
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
