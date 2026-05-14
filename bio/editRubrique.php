<?php include("headerInfo.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu administration </title>
<link href="css/style.css" type="text/css"  rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="sortable/example.css"/>
<script type="text/javascript" src="sortable/sortable.js"></script>


</head>

<body style="margin:auto 0px auto 0px">
<table width="1220" height="499" border="0" align="center" style="border:#999999 2px double;margin:40px auto 40px auto">
  <tr>
    <td colspan="3"><?php include("entete.php"); ?></td>
  </tr>
  <tr>
    <td height="40" colspan="3"><div align="center" class="titleRubrique">
      <p class="titreRubriquePrincipale">Gestion Rubriques</p>
    </div></td>
  </tr>
  <tr>
    <td width="162" height="376" valign="top"><?php include("rightCol.php"); ?></td>
    <td width="958" valign="top">
<?php

require_once __DIR__ . '/../includes/dbConnect.php';
$query="select * from rubriques where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
$data=$res->fetch(PDO::FETCH_ASSOC);

?>
<table width="980" height="190" border="0" align="center">
  <tr>
    <td valign="top" align="center">
	<form action="saveRub.php?id=<?php echo $_GET['id']; ?>" method="post">
	<table  width="780" height="100%" border="0" align="center" style="border:#666666 1px double">
    <tr>
        <td valign="top">Rubrique : </td>
        <td><?php echo batimod_utf8_encode($data['categ']); ?></td>
      </tr>
      <tr>
        <td width="200" valign="top">Description : </td>
        <td width="164">
        <textarea name="descr" cols="80" rows="15"><?php echo batimod_utf8_encode($data['descr']); ?></textarea>       </td>
      </tr>
      
      
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="userParamSaveButton" value="Enregistrer">
          <input type="reset" name="userParamResetButton" value="Annuler"></td>
      </tr>
    </table>
	</form>
	</td>
  </tr>
</table>
<?php 
}
else
{
echo batimod_utf8_encode("Erreur lors de la récupération des informations");
}
?></td>
  </tr></table>



</body>
</html>
