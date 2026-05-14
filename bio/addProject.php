<?php


include("headerInfo.php"); 

if(isset($_POST['titre']) && $_POST['titre']!=""){$titre=$_POST['titre'];}
if(isset($_POST['desc']) && $_POST['desc']!=""){$desc=$_POST['desc'];}

if(isset($_POST['categ']) && $_POST['categ']!=""){$categ=$_POST['categ'];}

if(isset($_POST['type']) && $_POST['type']!=""){$type=$_POST['type'];}

if(isset($_POST['active']) && $_POST['active']!=""){$active=$_POST['active'];}


if(isset($_FILES['image']) && $_FILES['image']!="")
{
	$dossier = '../images/';
	$fichier = basename($_FILES['image']['name']);
	$taille_maxi = 1000000;
	$taille = filesize($_FILES['image']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['image']['name'], '.'); 
	//D�but des v�rifications de s�curit�...
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
		 $fichier = strtr($fichier,'����������������������������������������������������','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		 if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que �a a fonctionn�...
		 {
			  
			  
			  include("includes/resize_image.php");
			   $path="images/".$fichier ;
			  redimensionner_image('../'.$path, 200,175);
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

$query="insert into projets (titre,descr, img,active,emplacement,categ,type) 
values ('".batimod_utf8_decode($titre)."','".batimod_utf8_decode($desc)."','".$fichier."','".$active."','".batimod_utf8_decode($emplacement)."','".$categ."','".$type."')";

$res=mysqli_query($con, $query) or die (mysqli_error($con));

if($res)
{
	header("Location: gestionProjets.php?err=succesAddProjet");
	die();
}
else
{
	header("Location: gestionProjets.php?err=errorAddProjet");
	die();
}
mysqli_close($con);
?>