<?php 

include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$query="Delete from contact where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
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

?>