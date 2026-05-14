<?php
/*
print_r($_FILES);
echo $_FILES['repImg']['error'];
die;*/
$dossier = '../images/gallerie/';
$fichier = basename($_FILES['repImg']['name']);
$taille_maxi = 1209715200;
$taille = filesize($_FILES['repImg']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['repImg']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array(strtolower($extension), $extensions)) //Si l'extension n'est pas dans le tableau
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
     $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['repImg']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {		
		include("includes/resize_image.php");
		$path="images/gallerie/".$_FILES['repImg']['name'];
		redimensionner_image('../'.$path, 800,600);
		
		include("includes/dbConnect.php");
		$query="update gallerie set path='".$path."' where id='".$_GET['id']."' ";
		$res=$pdo->query( $query);
		if(!$res)
		{
			echo 'Echec de l\'upload : mise à jour non effectué';
		}
		else
		{
			echo "Le fichier a bien été uploadé";
		}
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}



//-----------------------------------------------------------

?>