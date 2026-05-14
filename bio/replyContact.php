<?php
include("headerInfo.php");

$to = isset($_POST['emailClient']) ? trim((string) $_POST['emailClient']) : '';
if ($to === '' || filter_var($to, FILTER_VALIDATE_EMAIL) === false) {
	header("Location: gestionContact.php?err=failedSendingReply");
	die();
}

$body = (string) ($_POST['reponse'] ?? '');
$subject = 'Réponse à votre contact';
$mailSafeHeader = static function (string $v): string {
	return str_replace(["\r", "\n"], '', $v);
};
$headers = [
	'MIME-Version: 1.0',
	'Content-Type: text/html; charset=UTF-8',
	'From: ' . $mailSafeHeader('Afrique Beton <contact@afrique-beton.com>'),
];

$encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

if (!@mail($to, $encodedSubject, $body, implode("\r\n", $headers)))
{
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