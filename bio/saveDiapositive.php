<?php
include("headerInfo.php"); 
include("includes/dbConnect.php");
$id=$_GET['id'];

$query="Update diaporama set titre='".batimod_utf8_decode(addslashes($_POST['titre']))."', descr='".batimod_utf8_decode(addslashes($_POST['desc']))."' where id='".$id."'";

$res=mysqli_query($con, $query) or die (mysqli_error($con));

if($res)
{
	header("Location: gestionDiaporama.php?err=succesUpdateDiap");
	die();
}
else
{
	header("Location: gestionDiaporama.php?err=errorUpdateDiap");
	die();
}
mysqli_close($con);
?>