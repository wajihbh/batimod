<?php include("headerInfo.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu administration :   </title>
<link href="css/style.css" type="text/css"  rel="stylesheet" />
<SCRIPT LANGUAGE="JavaScript">

function affichage_popup(nom_de_la_page, nom_interne_de_la_fenetre)
{
window.open (nom_de_la_page, nom_interne_de_la_fenetre, config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no')
}

</SCRIPT> 	


</head>

<body style="margin:auto 0px auto 0px">
<table width="1220" height="499" border="0" align="center" style="border:#999999 2px double;margin:40px auto 40px auto">
  <tr>
    <td colspan="3"><?php include("entete.php"); ?></td>
  </tr>
  <tr>
    <td height="40" colspan="3"><div align="center" class="titleRubrique">
      <p class="titreRubriquePrincipale"> Modifier projet</p>
    </div></td>
  </tr>
  <tr>
    <td width="162" height="376" valign="top"><?php include("rightCol.php"); ?></td>
    <td width="958" valign="top">
    
    
<?php
include("includes/dbConnect.php");
$query="select * from gallerie where id='".$_GET['id']."' limit 1";
$res=$pdo->query( $query);
if($res)
{
$data=$res->fetch(PDO::FETCH_ASSOC);

?>
<form action="saveImgGalerie.php?id=<?php echo $data['id']; ?>" method="post" name="editGal">

  <table width="730" height="140"   border="0" align="center" cellpadding="0" cellspacing="0" >
     
     <tr><td width="180">Titre : </td><td><input type='text' value="<?php echo utf8_encode($data['titre']); ?>" name='titre' size="39"/></td></tr>
     <tr><td>Description : </td><td><textArea name='desc' cols="70" rows="9"><?php echo utf8_encode($data['descr']); ?></textArea></td></tr>
     <tr><td>Image Actuel : </td><td><img src="../<?php echo $data['path']; ?>"  /><br /> <a href="javascript:affichage_popup('modifierImgGallerie.php?id=<?php echo $data['id']; ?>','Modifier IMG');">Modifier</a><br /><br /></td></tr>    
     <tr><td><input type="submit" Value='Enregister'/></td><td><input type="reset" Value='Annuler'/></td></tr>
    </table>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    </form>
<?php 
}
else
{


}


?>
</td></tr></table>



</body>
</html>
