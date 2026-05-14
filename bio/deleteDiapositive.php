<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="Delete from diaporama where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query);
if($res)
{
	header("Location: gestionDiaporama.php?err=succesDelDiap");
	die();
}
else
{
	header("Location: gestionDiaporama.php?err=errorDelDiap");
	die();
}
mysqli_close($con);
?>