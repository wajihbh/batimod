<?php 
session_start();
$loginOK = false;

if (isset($_SESSION['login'])) { 
Header("location: ../admin/authentification.php");  
}else{	   
if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['pass']) && !empty($_POST['pass']))
{
$login=$_POST['login'];
$password=$_POST['pass'];

require ("../admin/connexion.php");
	if($con)
	{
	$requete="SELECT * FROM personne WHERE login='".$login."' AND admin = '1' AND password='".$password."';";
	$res=mysqli_query($con, $requete);
	
		if (mysqli_fetch_row($res))
		{
			
			header ('location: ../admin/ext/index.php');
		}
		else 
		{
			echo "login failed";
			?>
			<script language="javascript">
			window.alert('identification impossible');
			var d = document;
			d.location.href="autentification.php";
			</script>
			<?php
		}
	}
	else 
	{
		echo "echec de connexion � la base de donn�e";
		?>
		<script language="javascript">
		window.alert('echec de connexion � la base de donn�e');
		var d = document;
		d.location.href="autentification.php";
		</script>
		<?php 
	}
} 
else 
{
	echo "un champ au moins n'est pas saisie svp verifier votre saisie";
	?>
	<script language="javascript">
		window.alert('erreur : v�rifier votre saisie');
		var d = document;
		d.location.href="autentification.php";
		</script>
	<?php
}
}

?>