

<?php

	include("includes/dbConnect.php");
	$query="select * from rubriques";
	$res=mysqli_query($con, $query);
	if($res)
	{
		$i=1;
		echo "<table><tr class='headTable'><td>Catégorie</td><td>Contenu</td><td>Action</td></tr>";
		while($data=mysqli_fetch_assoc($res))
		{
		$color = ($i % 2) ? '#B8C8FE' : '#E8E8E8';
		$couleur_police = ($i % 2)  ? '#000000' : '#0069B3' ;
			echo "
			<tr bgcolor='".$color."'>
			<td><font color=\"".$couleur_police."\">".batimod_utf8_encode($data['categ'])."</font></td>
			<td><font color=\"".$couleur_police."\">".batimod_utf8_encode($data['descr'])."</font></td>
			<td><a href='editRubrique.php?id=".$data['id']."' title='Editer'><img src='images/edit.png' border='0'></a></td>
			</tr>
			";
			$i++;
		}
		echo "</table>";
	}
	else
	{
	echo "Données non disponible";
	}
	
	mysqli_close($con);
?>