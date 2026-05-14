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
     
      <p class="titreRubriquePrincipale"> Rubrique Gestion des Categories</p>
      </div></td>
  </tr>
  <tr>
    <td width="87" ><?php include("rightCol.php"); ?></td>
    <td width="1023" valign="top">

			<form action="addCateg.php" method="post">
			<table align="center">
			<tr><td>label Catégorie : </td><td><input type="text" value="" name="lbl"  /></td></tr>
			<tr><td><input type="submit" value="Enregistrer"  /></td><td><input type="reset" value="Annuler"  /></td></tr>
			</table>
			</form>
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
