<?php include("headerInfo.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu administration</title>
<link href="css/style.css" type="text/css"  rel="stylesheet" />
</head>

<body style="margin:auto 0px auto 0px">
<table width="1220" height="497" border="0" align="center" style="border:#999999 2px double;margin:40px auto 40px auto">
 <tr>
    <td colspan="3"><?php include("entete.php"); ?></td>
  </tr>
  <tr>
    <td height="38" colspan="3"><div align="center">
      <div align="center" >
       <p><span class="titleRubrique" >Rubrique Gestion des Rubriques</span></p>
      </div>
    </div></td>
  </tr>
  <tr>
    <td width="159" height="376" valign="top"><?php include("rightCol.php"); ?></td>
    <td width="979" valign="top">
      
     <?php include("getListRubrique.php");?>
    </td>
    <td width="64">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><span class="copyRight">&copy; Tout  droits réservés 2010</span></div></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
