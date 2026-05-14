<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="update gallerie set active='0' where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
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

?>