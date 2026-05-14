<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="Delete from gallerie where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
	header("Location: gererImgGalerie.php?id=".$_GET['proj']."&err=succesDelImgGal");
	die();
}
else
{
	header("Location: gererImgGalerie.php?id=".$_GET['proj']."&err=errorDelImgGal");
	die();
}

?>