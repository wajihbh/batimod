<?php include("headerInfo.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu administration</title>
<link href="css/style.css" type="text/css"  rel="stylesheet" />
</head>

<body style="margin:auto 0px auto 0px">
<table width="1220" height="499" border="0" align="center" style="border:#999999 2px double;margin:40px auto 40px auto">
  <tr>
    <td colspan="3"><?php include("entete.php"); ?></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="titleRubrique">
      <p><img src="images/message_config.gif" alt="" width="48" height="48" /></p>
      <p class="titreRubriquePrincipale"> Rubrique Gestion des contacts</p>
      </div></td>
  </tr>
  <tr>
    <td width="87" ><?php include("rightCol.php"); ?></td>
    <td width="1023" valign="top">
    
<?php
include("includes/dbConnect.php");
$idContact=$_GET['id'];
$query="Select * from contact where id='".$idContact."' limit 1";
$res=$pdo->query( $query);

if(!$res)
{
echo "Impossible de récupérer les informations du contact";
}
else
{
$data=$res->fetch(PDO::FETCH_ASSOC);

 ?>
<br />
 <p align="center"><a href="gestionContact.php" class="linkMenu"><img src="images/back.gif" width="16" height="16" border="0" /> &nbsp;Retour à la liste des contacts</a></p>
   <table width="932" align="center">
   <tr>
    <td width="383">
    
            <table width="410" height="227" border="0" align="center" cellpadding="0" cellspacing="1" style="border:#999999 3px  double">
              <tr>
                <td height="19" colspan="2" class="titreCol"><div align="center">Informations du contact</div><br /><br /></td>
              </tr>
              <tr><td width="124" height="15"><div align="left"><span class="titreCol">Date réception :</span></div></td>
                <td width="201"><?php echo $data['dateEnvoie']; ?></td>
              </tr>
               <tr> <td width="124" height="15"><div align="left" ><span class="titreCol">Nom :</span></div></td>
                 <td><?php echo $data['nom']; ?></td>
               </tr>
               <tr> <td width="124" height="15"><div align="left"><span class="titreCol">Prénom :</span></div></td>
                 <td><?php echo $data['prenom']; ?></td>
               </tr>    
               <tr> <td width="124" height="15"><div align="left"><span class="titreCol">Téléphonne :</span></div></td>
                 <td><?php echo $data['tel']; ?></td>
               </tr>           
                <tr> <td width="124" height="15"><div align="left"><span class="titreCol">Email :</span></div></td>
                 <td><?php echo $data['mail']; ?></td>
               </tr>
                <tr><td width="124" height="15" class="titreCol"> <div align="left" >Message :</div></td>
                  <td><?php echo $data['msg']; ?></td>
                </tr>
            </table>
    </td>
    <td width="417">
    <?php
	if($data['replyed']=="1")
	{
	$queryResponse="Select * from reponseContact where id='".$idContact."' limit 1";
	$resRep=$pdo->query( $queryResponse);
	if($resRep)
	{
	$newdata=$resRep->fetch(PDO::FETCH_ASSOC);
	?>
            <table width="410" height="227" border="0" align="center" cellpadding="0" cellspacing="1" style="border:#999999 3px  double" >
              <tr>
              <td height="33" class="titreCol">
              <div align="center">La réponse au contact de <b><?php echo $data['nom']." ".$data['prenom']; ?></b> expédiée le <b><?php echo $newdata['dateReponse']; ?></b> </div> <br />
              </td>
              </tr>
              <tr>
              <td height="143" class="titreCol">
            
                    <div align="center">Réponse </div>
                    <div align="center"><textarea name="reponse" id="textarea" cols="40" rows="7" disabled="disabled" style="width:auto; height:auto"><?php echo $newdata['contenuReponse'];  ?></textarea></div>
               
                </td>
               </tr>
                <tr>
                  <td height="41" >
                    <div align="center">
                      <input type="submit" name="button" id="button" value="Envoyer la réponse" class="titreCol" disabled="disabled"/>              
                    </div>
                    </td>
                  </tr>
            </table>
	<?php
	}
	else
	{
	?>
     <form name="reponse" action="replyContact.php" method="post">
     <table width="410" height="227" border="0" align="center" cellpadding="0" cellspacing="1" style="border:#999999 3px  double">
      <tr>
        <td height="33" class="titreCol">
        <div align="center">Répondre au contact de <b><?php echo $data['nom']." ".$data['prenom']; ?></b> </div>
          <br />
        </td>
      </tr>
        <tr>
        <td height="143" class="titreCol">
            <div align="center">Réponse </div>
            <div align="center">
            <input type="hidden" name="idContact" value="<?php echo $idContact; ?>" />
            <input type="hidden" name="emailClient" value="<?php echo $data['mail']; ?>" />
            <textarea name="reponse" id="textarea" cols="40" rows="7"></textarea>
            </div>
        </td>
          </tr>
        <tr>
          <td height="41" >
            <div align="center">
              <input type="submit" name="button" id="button" value="Envoyer la réponse" class="titreCol"/>              
            </div></td>
          </tr>
    </table>
    </form>
    
    <?php
	}
    }
	else
	{
	?>
    <form name="reponse" action="replyContact.php" method="post">
     <table width="410" height="227" border="0" align="center" cellpadding="0" cellspacing="1" style="border:#999999 3px  double">
      <tr>
        <td height="33" class="titreCol">
        <div align="center">Répondre au contact de <b><?php echo $data['nom']." ".$data['prenom']; ?></b> </div>
          <br />
        </td>
      </tr>
        <tr>
        <td height="143" class="titreCol">
            <div align="center">Réponse </div>
            <div align="center">
            <input type="hidden" name="idContact" value="<?php echo $idContact; ?>" />
            <input type="hidden" name="emailClient" value="<?php echo $data['mail']; ?>" />
            <textarea name="reponse" id="textarea" cols="40" rows="7"></textarea>
            </div>
        </td>
          </tr>
        <tr>
          <td height="41" >
            <div align="center">
              <input type="submit" name="button" id="button" value="Envoyer la réponse" class="titreCol"/>              
            </div></td>
          </tr>
    </table>
    </form>
    
    <?php
	}
	?>
    </td>
    </tr>
    </table>
<?php
}

?>
    
    <p align="center"> <a href="gestionContact.php" class="linkMenu"><img src="images/back.gif" width="16" height="16" border="0" /> &nbsp;Retour à la liste des contacts</a></p>
    </td>
    <td width="92">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><span class="copyRight">  &copy; Tout  droits réservés 2012</span></div></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
