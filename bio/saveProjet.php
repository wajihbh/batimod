<?php
include("headerInfo.php"); 
include("includes/dbConnect.php");
$id=$_GET['id'];

$query="Update projets set 

titre='".addslashes(utf8_decode($_POST['titre']))."', 
descr='".addslashes(utf8_decode($_POST['desc']))."', 
Emplacement='".utf8_decode(addslashes($_POST['emplacement']))."', 
categ='".utf8_decode(addslashes($_POST['categ']))."', 
type='".utf8_decode(addslashes($_POST['type']))."'
where id='".$id."'";

$res=mysqli_query($con, $query) or die (mysqli_error($con));

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
mysqli_close($con);
?>