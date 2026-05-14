<?php 

include("headerInfo.php"); 
include("includes/dbConnect.php");
$query="Delete from projets where id='".$_GET['id']."' limit 1";
$res=mysqli_query($con, $query);
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
mysqli_close($con);
?>