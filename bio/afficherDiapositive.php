<?php 
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$query="update diaporama set active='1' where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
	header("Location: gestionDiaporama.php?err=succesAffDiap");
	die();
}
else
{
	header("Location: gestionDiaporama.php?err=errorAffDiap");
	die();
}

?>