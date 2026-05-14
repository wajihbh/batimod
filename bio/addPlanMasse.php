<?php
include("headerInfo.php"); 

if(isset($_POST['desc']) && $_POST['desc']!=""){$desc=$_POST['desc'];}
if(isset($_POST['active']) && $_POST['active']!=""){$active=$_POST['active'];}
if(isset($_POST['idProj']) && $_POST['idProj']!=""){$projet=$_POST['idProj'];}


if(isset($_FILES['image']) && $_FILES['image']!="")
{
	$dossier = '../images/planDeMasse/';
	$fichier = basename($_FILES['image']['name']);
	$taille_maxi = 1000000;
	$taille = filesize($_FILES['image']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['image']['name'], '.'); 
	//Début des vérifications de sécurité...
	if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		 $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
	}
	if($taille>$taille_maxi)
	{
		 $erreur = 'Le fichier est trop gros...';
	}
	if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
	{
		 //On formate le nom du fichier ici...
		 $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		 if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		 {
			 
			  include("includes/resize_image.php");
			   $path="images/planDeMasse/".$fichier ;
			  redimensionner_image('../'.$path, 800, 600);
			  
			  
		 }
		 else //Sinon (la fonction renvoie FALSE).
		 {
			  $path="images/noimg.jpg";
		 }
	}
	else
	{
		 die($erreur);
	}
}


include("includes/dbConnect.php");

$query="insert into masse (titre,descr,projet, path,active) values ('".$titre."','".$desc."','".$projet."','".$path."','".$active."')";

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