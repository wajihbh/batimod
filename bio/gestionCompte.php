<?php include("headerInfo.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu administration :   </title>
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
      <p class="titreRubriquePrincipale">Gestion info compte admin</p>
    </div></td>
  </tr>
  <tr>
    <td width="162" height="376" valign="top"><?php include("rightCol.php"); ?></td>
    <td width="958" valign="top">
<?php

include 'includes/dbConnect.php';

$login = (string) ($_SESSION['userLogin'] ?? '');
$userId = (int) ($_SESSION['userId'] ?? 0);
$data = null;
$stmt = mysqli_prepare($con, 'SELECT * FROM adminuser WHERE login = ? AND idCompte = ? LIMIT 1');
if ($stmt !== false && $userId > 0) {
    mysqli_stmt_bind_param($stmt, 'si', $login, $userId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    $data = $res ? mysqli_fetch_assoc($res) : null;
    if ($res instanceof mysqli_result) {
        mysqli_free_result($res);
    }
}

if ($data !== null) {
    $h = static function (?string $s): string {
        return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    };

?>
<table width="678" height="190" border="0" align="center">
  <tr>
    <td width="326" height="23"><div align="center" style="color:#FFFFFF; background-color:#333333"><strong>Ancienne information du compte </strong></div></td>
    <td width="342"><div align="center" style="color:#FFFFFF; background-color:#333333"><strong>Nouvelle information du compte </strong></div></td>
  </tr>
  <tr>
    <td height="161" valign="top" align="center"><table width="325" height="159" border="0" style="border:#666666 1px double">
      <tr>
        <td width="133">Nom : </td>
        <td width="136"><?php echo $h($data['nom'] ?? ''); ?></td>
      </tr>
      <tr>
        <td>Pr&eacute;nom : </td>
        <td><?php echo $h($data['prenom'] ?? ''); ?></td>
      </tr>
      <tr>
        <td>Login : </td>
        <td><?php echo $h($data['login'] ?? ''); ?></td>
      </tr>
      <tr>
        <td>Mot de passe : </td>
        <td><?php echo !empty($data['password_hash']) ? '(mot de passe securise)' : $h($data['pass'] ?? ''); ?></td>
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
	<table width="342" border="0" align="center" style="border:#666666 1px double">
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
        <td><input  type="hidden" name="id" value="<?php echo base64_encode((string) ($data['idCompte'] ?? '')); ?>"/></td>
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
} else {
    echo htmlspecialchars('Erreur lors de la récupération des informations', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?></td>
  </tr></table>



</body>
</html>
