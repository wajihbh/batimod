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
    <td height="40" colspan="3"><div align="center" class="titleRubrique">
        <p class="titreRubriquePrincipale"> Ajouter un Projet</p>
      </div></td>
  </tr>
  <tr>
    <td width="162" height="376" valign="top"><?php include("rightCol.php"); ?></td>
    <td width="958" valign="top"><form action="addProject.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
        <table width="730" height="140"   border="0" align="center" cellpadding="0" cellspacing="0" >
          <tr>
            <td width="180">Titre : </td>
            <td><input type='text' value="" name='titre' size="39"/></td>
          </tr>
          <tr>
            <td>Description : </td>
            <td><textArea name='desc' cols="70" rows="9"></textArea></td>
          </tr>
          <tr>
            <td>Catégorie :</td>
            <td><select name="categ">
                <?php 
				include("includes/dbConnect.php");
				$query="Select * from categorie";
				$res=mysqli_query($con, $query);
				if($res)
				{
					while($data=mysqli_fetch_assoc($res))
					{
					
					echo '<option value="'.$data['id'].'">'.utf8_encode($data['label']).'</option>';
					}
				}
				else
				{
				echo '<option value="0">Aucun element</option>';
				}
				?>
                
              </select>
            </td>
          </tr>
          <tr>
            <td>Image : </td>
            <td><input type="file" name="image" />
            </td>
          </tr>

          <tr>
            <td>Emplacement : </td>
            <td><input type="text" name="emplacement"  />
            </td>
          </tr>
          
          <tr>
            <td>Type : </td>
            <td>
            <select name="type">
                <option value='1'>Référence</option>
                <option value='2' >En Cours</option>
              </select>
            </td>
          </tr>
          
          
          <tr>
            <td>Active : </td>
            <td><select name="active"> <option value="1">Oui</option><option value="0">Non</option></select>
            </td>
          </tr>
          <tr>
            <td><input type="submit" Value='Enregister'/></td>
            <td><input type="reset" Value='Annuler'/></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
</body>
</html>
