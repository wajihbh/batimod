

<?php

	require_once __DIR__ . '/../includes/dbConnect.php';
	$query="select * from rubriques";
	$res=$pdo->query( $query);
	if($res)
	{
		$i=1;
		echo "<table><tr class='headTable'><td>Catégorie</td><td>Contenu</td><td>Action</td></tr>";
		while($data=$res->fetch(PDO::FETCH_ASSOC))
		{
		$color = ($i % 2) ? '#B8C8FE' : '#E8E8E8';
		$couleur_police = ($i % 2)  ? '#000000' : '#0069B3' ;
			echo "
			<tr bgcolor='".$color."'>
			<td><font color=\"".$couleur_police."\">".utf8_encode($data['categ'])."</font></td>
			<td><font color=\"".$couleur_police."\">".utf8_encode($data['descr'])."</font></td>
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
	
	
?>