<?php
require_once __DIR__ . '/../includes/dbConnect.php';

$query="Select * from categorie";
$res=$pdo->query( $query);

if($res)
{	$i=1;
	while($data=$res->fetch(PDO::FETCH_ASSOC))
	{
	$color = ($i % 2) ? '#B8C8FE' : '#E8E8E8';
	$couleur_police = ($i % 2)  ? '#000000' : '#0069B3' ;
	
	echo "
	<tr bgcolor='".$color."' align='center'>
		<td><font color=\"".$couleur_police."\">".$i."</font></td>
		<td><font color=\"".$couleur_police."\">".utf8_encode($data['label'])."</font></td>
		<td align='center'>
			<a href='editerCategorie.php?id=".$data['id']."' title='Editer' ><img src='images/edit.png' border=0/></a>
			&nbsp;&nbsp;<a href='deleteCategorie.php?id=".$data['id']."' title='Supprimer'><img src='images/delete.png' border=0/></a>&nbsp;&nbsp;
			
		</td>
	</tr>";
$i++;
	}
}
else
{
echo "<tr><td colspan='4' align='center'><div class='info'>Liste contact vide</div></td></tr>";
}
?>