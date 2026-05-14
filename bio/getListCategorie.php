<?php
include("includes/dbConnect.php");

$query="Select * from categorie";
$res=mysqli_query($con, $query);

if($res)
{	$i=1;
	while($data=mysqli_fetch_assoc($res))
	{
	$color = ($i % 2) ? '#B8C8FE' : '#E8E8E8';
	$couleur_police = ($i % 2)  ? '#000000' : '#0069B3' ;
	
	echo "
	<tr bgcolor='".$color."' align='center'>
		<td><font color=\"".$couleur_police."\">".$i."</font></td>
		<td><font color=\"".$couleur_police."\">".batimod_utf8_encode($data['label'])."</font></td>
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