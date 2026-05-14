<?php
include("headerInfo.php");
include("includes/dbConnect.php");
$query="insert into categorie  (label) values ('".addslashes(batimod_utf8_decode($_POST['lbl']))."')";
$res=mysqli_query($con, $query) or die (mysqli_error($con));
mysqli_close($con);
if(!$res)
{
	header("Location: gestionCategorie.php?err=majCatError");
	die();
}
else
{
	header("Location: gestionCategorie.php?err=majCatSucess");
	die();
}
?>
