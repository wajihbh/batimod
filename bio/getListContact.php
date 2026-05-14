<?php
include("includes/dbConnect.php");

$query="Select * from contact";
$res=$pdo->query( $query);

if($res)
{	$i=1;
	while($data=$res->fetch(PDO::FETCH_ASSOC))
	{
	$color = ($i % 2) ? '#B8C8FE' : '#E8E8E8';
	$couleur_police = ($i % 2)  ? '#000000' : '#0069B3' ;
	$reply=($data['replyed']) ? 'email_delete.png' : 'tick.gif';
	$replyTitle=($data['replyed']) ? 'Email lu' : 'Marquer comme lu';
	
	echo "
	<tr bgcolor='".$color."' align='center'>
		<td><font color=\"".$couleur_police."\">".$i."</font></td>
		<td><font color=\"".$couleur_police."\">".$data['dateEnvoie']."</font></td>
		<td><font color=\"".$couleur_police."\">".$data['nom']."</font></td>
		<td><font color=\"".$couleur_police."\">".$data['prenom']."</fon></td> 
		<td><font color=\"".$couleur_police."\">".$data['mail']."</font></td> 
		<td><font color=\"".$couleur_police."\">".$data['tel']."</font></td> 
		<td><font color=\"".$couleur_police."\">".$data['msg']."</font></td>
		<td align='center'>
			<a href='editerContact.php?id=".$data['id']."' title='Editer' ><img src='images/edit.png' border=0/></a>
			&nbsp;&nbsp;<a href='deleteContact.php?id=".$data['id']."' title='Supprimer'><img src='images/delete.png' border=0/></a>&nbsp;&nbsp;
			<a href='tagContact.php?id=".$data['id']."' title='".$replyTitle."'><img src='images/".$reply."' border=0/></a>
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