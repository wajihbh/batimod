<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu administration</title>
<link href="css/style.css" type="text/css"  rel="stylesheet" media="screen" />
</head>

<body style="margin:auto 0px auto 0px; background-color:#fff">
<table width="1024" height="410" border="0" align="center" style="margin:40px auto 40px auto">
  <tr>
    <td height="21" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" colspan="3"><div align="center">
      <p class="summerTitle">Administration</p>
    </div></td>
  </tr>
  <tr><td colspan="3" align="center"> <?php include('erreur.php'); ?></td></tr>
  <tr>
    <td width="139" height="311">&nbsp;</td>
    <td width="980">
    <form action="connectAdmin.php" method="post">
    <table width="413" height="207" border="0" align="center" style="border:#999999 3px double">
  <tr>
    <td height="91" colspan="2"><div align="center">
      <p class="Style1"><img src="images/admino.png" width="128" height="128" /></p>
      </div></td>
    </tr>
  <tr>
    <td width="157" class="copyRight"><div align="right"><span class="Style5">Login</span> </div></td>
    <td width="240"><label>
      <input name="login" type="text" class="copyRight" id="login" size="35" />
    </label></td>
  </tr>
  <tr>
    <td height="41" class="copyRight"><div align="right" class="Style5">Password </div></td>
    <td><label>
      <input name="pass" type="password" class="copyRight" id="pass" size="35" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input name="button" type="submit" class="buttonMenu" id="button" value="Connexion" />
        </div>
    </td>
    </tr>
</table>
</form>
</td>
    <td width="83">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><span class="copyRight">  &copy; Tout  droits réservés 2010 - 2011</span></div></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
