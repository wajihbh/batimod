<?php include("headerInfo.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu administration :</title>
<link href="css/style.css" type="text/css"  rel="stylesheet" />
</head>
<body style="margin:auto 0px auto 0px">
<table width="1220" height="499" border="0" align="center" style="border:#999999 2px double;margin:40px auto 40px auto">
  <tr>
    <td colspan="3"><?php include("entete.php"); ?></td>
  </tr>
  <tr>
    <td height="40" colspan="3"><div align="center" class="titleRubrique">
        <p class="titreRubriquePrincipale"> Gestion des Contact</p>
      </div></td>
  </tr>
  <tr>
    <td width="162" height="376" valign="top"><?php include("rightCol.php"); ?></td>
    <td width="958" valign="top"><table width="1200" height="17" border="0" align="center" cellpadding="0" cellspacing="0" class="sortable" id="anyid">
        <tr >
          <th style="background-color:#0099CC;"> N°</th>
          <th style="background-color:#0099CC;">Date réception</th>
          <th style="background-color:#0099CC;">Nom</th>
          <th style="background-color:#0099CC;">Prénom</th>
          <th style="background-color:#0099CC;">Email </th>
          <th style="background-color:#0099CC;">Téléphonne</th>
          <th style="background-color:#0099CC;">Message</th>
          <th style="background-color:#0099CC;">Action</th>
        </tr>
        <?php include("getListContact.php");?>
      </table></td>
  </tr>
</table>
</body>
</html>
