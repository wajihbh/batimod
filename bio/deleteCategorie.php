<?php 

include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="Delete from categorie where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
	header("Location: gestionCategorie.php?err=succesSupCateg");
	die();
}
else
{
	header("Location: gestionCategorie.php?err=errorSupCateg");
	die();
}

?>