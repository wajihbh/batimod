<?php
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$id=$_GET['id'];

$query="Update diaporama set titre='".batimod_utf8_decode(addslashes($_POST['titre']))."', descr='".batimod_utf8_decode(addslashes($_POST['desc']))."' where id='".$id."'";

$res=$pdo->query( $query);

if($res)
{
	header("Location: gestionDiaporama.php?err=succesUpdateDiap");
	die();
}
else
{
	header("Location: gestionDiaporama.php?err=errorUpdateDiap");
	die();
}

?>