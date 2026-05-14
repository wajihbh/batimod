<?php


include("headerInfo.php");
require_once __DIR__ . '/../includes/dbConnect.php';

if(isset($_POST['nom']) && $_POST['nom']!="")
{
	$query="Update adminuser set nom='".$_POST['nom']."' where idCompte='".base64_decode($_POST['id'])."' limit 1";
	$res=$pdo->query( $query);
	if(!$res)
	{
	header("Location: gestionCompte.php?err=LastNameLoggerError");
	die();
	}
}

if(isset($_POST['prenom']) && $_POST['prenom']!="")
{
	$query="Update adminuser set prenom='".$_POST['prenom']."' where idCompte='".base64_decode($_POST['id'])."' limit 1";
	$res=$pdo->query( $query);
	if(!$res)
	{
	header("Location: gestionCompte.php?err=FirstNameLoggerError");
	die();
	}
}

if(isset($_POST['login']) && $_POST['login']!="")
{
	$query="Update adminuser set login='".$_POST['login']."' where idCompte='".base64_decode($_POST['id'])."' limit 1";
	$res=$pdo->query( $query);
	if(!$res)
	{
		header("Location: gestionCompte.php?err=LoginLoggerError");
		die();
	}
	else
	{
		$_SESSION['userLogin']=$_POST['login'];
	}
}

if(isset($_POST['mdp']) && $_POST['mdp']!="")
{
	$query="Update adminuser set pass='".$_POST['mdp']."', hashpass='".md5($_POST['mdp'])."' where idCompte='".base64_decode($_POST['id'])."' limit 1";
	$res=$pdo->query( $query);
	if(!$res)
	{
		header("Location: gestionCompte.php?err=PassLoggerError");
		die();
	}
	else
	{
		$_SESSION['userPass']=md5($_POST['mdp']);
	}
}


header("Location: gestionCompte.php?err=SucessLoggerApt");
die();

?>