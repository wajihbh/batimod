<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="update contact set repliyed='1' where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query);
if($res)
{
	header("Location: gestionContact.php?err=succesSupContact");
	die();
}
else
{
	header("Location: gestionContact.php?err=errorSupContact");
	die();
}
mysqli_close($con);
?>