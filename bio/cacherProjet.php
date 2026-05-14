<?php 
include("headerInfo.php"); 
require_once __DIR__ . '/../includes/dbConnect.php';
$query="update projets set active='0' where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
	header("Location: gestionProjets.php?err=succesCacherProjet");
	die();
}
else
{
	header("Location: gestionProjets.php?err=errorCacherProjet");
	die();
}

?>