<?php
include("headerInfo.php");
include('includes/PHPMailer/class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"
$body             = $_POST['reponse'];
$mail->From       = "contact@afrique-beton.com";
$mail->FromName   = "Afrique Beton";
$mail->Subject    ="R&eacute;ponse &aacute; votre contact";
$mail->MsgHTML($body);
$mail->AddAddress($_POST['emailClient'],"Cher Client");

if(!$mail->Send()) 
{
	//echo "Mailer Error: " . $mail->ErrorInfo;
	header("Location: gestionContact.php?err=failedSendingReply");
	die();
}
else
{
	include("includes/dbConnect.php");
	$query="Update contact set replyed='1' where id='".$_POST['idContact']."'";
	$query1="Insert into reponsecontact (`idRep` , `contenuReponse`, `dateReponse` ) values ('".$_POST['idContact']."','".$_POST['reponse']."','".date("Y-m-d H:i:s")."')";
	$res=mysqli_query($con, $query) or die(mysqli_error($con));
	$res1=mysqli_query($con, $query1) or die(mysqli_error($con));
	if($res && $res1)
	{
	header("Location: gestionContact.php?err=successSendingReply");
	die();
	}
	else
	{
	header("Location: gestionContact.php?err=failedSendingReply");
	die();
	}
}
?>