<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="update diaporama set active='1' where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query);
if($res)
{
	header("Location: gestionDiaporama.php?err=succesAffDiap");
	die();
}
else
{
	header("Location: gestionDiaporama.php?err=errorAffDiap");
	die();
}
mysqli_close($con);
?>