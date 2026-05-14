<?php 
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$query="update gallerie set active='1' where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
	header("Location: gererImgGalerie.php?id=".$_GET['proj']."&err=succesSupImgGal");
	die();
}
else
{
	header("Location: gererImgGalerie.php?id=".$_GET['proj']."&err=errorSupImgGal");
	die();
}

?>