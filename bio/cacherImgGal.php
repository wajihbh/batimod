<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="update gallerie set active='0' where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query);
if($res)
{
	header("Location: gererImgGalerie.php?id=".$_GET['proj']."&err=succesCacherImgGal");
	die();
}
else
{
	header("Location: gererImgGalerie.php?id=".$_GET['proj']."&err=errorCacherImgGal");
	die();
}
mysqli_close($con);
?>