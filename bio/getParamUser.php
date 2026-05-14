<?php
include("getConnexion.php");
$query="select * from adminuser where zLogin='".$_SESSION['userLogin']."' and zpasshash='".$_SESSION['userPass']."' limit 1";
$res=mysqli_query($con, $query);
if($res)
{
$data=mysqli_fetch_assoc($res);

?>
<table width="678" height="190" border="0">
  <tr>
    <td width="326" height="23"><div align="center" style="color:#FFFFFF; background-color:#333333"><strong>Ancienne information du compte </strong></div></td>
    <td width="342"><div align="center" style="color:#FFFFFF; background-color:#333333"><strong>Nouvelle information du compte </strong></div></td>
  </tr>
  <tr>
    <td height="161" valign="top" align="center"><table width="325" height="159" border="0" style="border:#666666 1px double">
      <tr>
        <td width="133">Nom : </td>
        <td width="136"><?php echo $data['nom']; ?></td>
      </tr>
      <tr>
        <td>Pr&eacute;nom : </td>
        <td><?php echo $data['prenom']; ?></td>
      </tr>
      <tr>
        <td>Login : </td>
        <td><?php echo $data['zlogin']; ?></td>
      </tr>
      <tr>
        <td>Mot de passe : </td>
        <td><?php echo $data['zpass']; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td valign="top" align="center">
	<form action="saveParamUser.php" method="post">
	<table width="342" border="0" style="border:#666666 1px double">
      <tr>
        <td width="106">Nom : </td>
        <td width="164">
          <input type="text" name="nom">
       </td>
      </tr>
      <tr>
        <td>Pr&eacute;nom : </td>
        <td><input type="text" name="prenom"></td>
      </tr>
      <tr>
        <td>Login : </td>
        <td><input type="text" name="login"></td>
      </tr>
      <tr>
        <td>Mot de passe : </td>
        <td><input type="text" name="mdp"></td>
      </tr>
      <tr>
        <td><input  type="hidden" name="id" value="<?php echo base64_encode($data['idUser']); ?>"/></td>
        <td>&nbsp;</td>
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
echo utf8_decode("Erreur lors de la r�cup�ration des informations");
}
?>