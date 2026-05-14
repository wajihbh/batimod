<?php
include("headerInfo.php"); 
include("includes/dbConnect.php");
$id=$_GET['id'];

$query="Update projets set 

titre='".addslashes(batimod_utf8_decode($_POST['titre']))."', 
descr='".addslashes(batimod_utf8_decode($_POST['desc']))."', 
Emplacement='".batimod_utf8_decode(addslashes($_POST['emplacement']))."', 
categ='".batimod_utf8_decode(addslashes($_POST['categ']))."', 
type='".batimod_utf8_decode(addslashes($_POST['type']))."'
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