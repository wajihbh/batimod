<?php
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$id=$_GET['id'];

$query="Update projets set 

titre='".addslashes(batimod_utf8_decode($_POST['titre']))."', 
descr='".addslashes(batimod_utf8_decode($_POST['desc']))."', 
Emplacement='".batimod_utf8_decode(addslashes($_POST['emplacement']))."', 
categ='".batimod_utf8_decode(addslashes($_POST['categ']))."', 
type='".batimod_utf8_decode(addslashes($_POST['type']))."'
where id='".$id."'";

$res=$pdo->query( $query);

if($res)
{
	header("Location: gestionProjets.php?err=succesAptProjet");
	die();
}
else
{
	header("Location: gestionProjets.php?err=errorAptProjet");
	die();
}

?>