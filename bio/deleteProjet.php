<?php 

include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$query="Delete from projets where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
	header("Location: gestionProjets.php?err=succesSupProjet");
	die();
}
else
{
	header("Location: gestionProjets.php?err=errorSupProjet");
	die();
}

?>