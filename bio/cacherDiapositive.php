<?php 
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$query="update diaporama set active='0' where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
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

?>