<?php 
include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="update projets set active='0' where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query);
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
mysqli_close($con);
?>