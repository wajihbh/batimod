<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="update diaporama set active='0' where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query);
if($res)
{
	header("Location: gestionDiaporama.php?err=succesCachDiap");
	die();
}
else
{
	header("Location: gestionDiaporama.php?err=errorCachDiap");
	die();
}
mysqli_close($con);
?>