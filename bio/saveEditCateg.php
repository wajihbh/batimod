<?php
include("headerInfo.php");
include("includes/dbConnect.php");
$query="Update categorie set label='".addslashes(batimod_utf8_decode($_POST['lbl']))."' where id='".$_GET['id']."' limit 1";
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
