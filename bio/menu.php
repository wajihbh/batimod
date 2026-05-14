<?php include("headerInfo.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu administration </title>
<link href="css/style.css" type="text/css"  rel="stylesheet"  />
</head>

<body style="margin:auto 0px auto 0px">
<table width="1220" height="499" border="0" align="center" style="border:#999999 2px double;margin:40px auto 40px auto">
  <tr>
    <td colspan="3"><?php include("entete.php"); ?></td>
  </tr>
  <tr>
    <td height="40" colspan="3"><div align="center">
      <p class="summerTitle">Menu Administration</p>
    </div></td>
  </tr>
  <tr>
    <td width="76" height="376"></td>
    <td width="852"><table width="852" height="221" border="0" align="center" cellpadding="4" cellspacing="4">
      <tr>
        <td width="238" height="87"><table width="200" border="0"  class="buttonMenu">
          <tr>
            <td><div align="center"><a href="gestionContact.php"><img src="images/message_config.gif" alt="" width="48" height="48" border="0" /></a></div></td>
          </tr>
          <tr>
            <td><div align="center" ><a href="gestionContact.php" class="linkMenu">Gestion des contacts</a></div></td>
          </tr>
        </table></td>
        <td width="239"><table width="200" border="0" style="border:#999999 double 3px" class="buttonMenu">
          <tr>
            <td><div align="center"><a href="gestionCompte.php"><img src="images/admin_grades.gif" alt="" width="48" height="48" border="0" /></a></div></td>
          </tr>
          <tr>
            <td><div align="center"><a href="gestionCompte.php" class="linkMenu">Paramètre de mon compte</a></div></td>
          </tr>
        </table></td>
        <td width="232"><table width="200" border="0"  class="buttonMenu">
          <tr>
            <td><div align="center"><img src="images/backup.gif" alt="" width="48" height="48" /></div></td>
          </tr>
          <tr>
            <td><div align="center"><a href="gestionProjets.php" class="linkMenu">Gestion des Projets</a></div></td>
          </tr>
        </table></td>
        <td width="200">&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="82"><table width="200" border="0" style="border:#999999 double 3px" class="buttonMenu">
          <tr>
            <td><div align="center"><a href="gestionRubrique.php"><img src="images/config.gif" alt="" width="48" height="48" border="0" /></a></div></td>
          </tr>
          <tr>
            <td><div align="center"><a href="gestionRubrique.php" class="linkMenu">Gestion des rubriques</a></div></td>
          </tr>
        </table></td>
        <td><table width="200" border="0" style="border:#999999 double 3px" class="buttonMenu">
          <tr>
            <td><div align="center"><img src="images/apparence.gif" alt="" width="48" height="48" /></div></td>
          </tr>
          <tr>
            <td><div align="center"><a href="gestionDiaporama.php" class="linkMenu">Gestion des Diaporama</a></div></td>
          </tr>
        </table></td>
        <td><table width="200" border="0" style="border:#999999 double 3px" class="buttonMenu">
          <tr>
            <td><div align="center"><a href="gestionCategorie.php"><img src="images/modif_prop.gif" alt="" width="48" height="48" border="0" /></a></div></td>
          </tr>
          <tr>
            <td><div align="center" ><a href="gestionCategorie.php" class="linkMenu">Gestion des Catégories des Projets</a></div></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
      </td>
    <td width="67">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><span class="copyRight">  &copy; Tout  droits réservés 2010</span></div></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
