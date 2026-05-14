<?php 
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$query="Delete from diaporama where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
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

?>