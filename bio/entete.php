<table width="800" height="19%" border="0" align="center" cellpadding="0" cellspacing="0" class="entetHeader">
  <tr>
    <td width="30%">&nbsp;&nbsp;&nbsp; <span class="msgAcceuil"> Aujourd'hui le : <?php echo date("Y-m-d"); ?> </span> </td>
    <td width="3%"><a href="menu.php"><img src="images/homepage.gif" alt="" width="36" height="36" border="0" /></a></td>
    <td width="27%"><a href="menu.php" class="userName">Menu principal</a></td>
    <td width="2%"><a href="gestionCompte.php"><img src="images/profil.gif" alt="" width="36" height="36" border="0" /></a></td>
    <td width="29%"><span class="msgAcceuil">Bienvenue</span> &nbsp;&nbsp;<a href="gestionCompte.php" class="userName"><?php echo $_SESSION['userLogin']; ?></a></td>
    <td width="3%"><a href="logout.php"><img src="images/deconnexion.gif" alt="" width="36" height="36" border="0" /></a></td>
    <td width="6%"><a href="logout.php" class="userName">Déconnexion</a></td>
  </tr>
  <tr>
    <td colspan="7" align="center"><?php include('erreur.php'); ?>
    </td>
  </tr>
</table>