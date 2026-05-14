<?php
include("headerInfo.php"); 
include("includes/dbConnect.php");
$id=$_GET['id'];

$query="Update diaporama set titre='".utf8_decode(addslashes($_POST['titre']))."', descr='".utf8_decode(addslashes($_POST['desc']))."' where id='".$id."'";

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