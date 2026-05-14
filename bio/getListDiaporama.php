<?php
	require_once __DIR__ . '/../includes/dbConnect.php';
	$query="select * from diaporama";
	$res=$pdo->query( $query);
	$i=1;
	while($data=$res->fetch(PDO::FETCH_ASSOC))
	{
		$color = ($i % 2) ? '#B8C8FE' : '#E8E8E8';
		$couleur_police = ($i % 2)  ? '#000000' : '#0069B3';
		if($data['active']=='0'){$publish="<a href='afficherDiapositive.php?id=".$data['id']."' title='Afficher'><img src='images/afficher.gif' border=0 width=15 height=15 /></a>";}
		else{$publish="<a href='cacherDiapositive.php?id=".$data['id']."' title='Cacher'><img src='images/cacher.gif' border=0 width=15 height=15 /></a>";}
		
		echo "
		<tr bgcolor='".$color."' align='center'>
		<td><font color=\"".$couleur_police."\">".$data['id']."</font></td>
		<td><font color=\"".$couleur_police."\"> <img src='../images/".$data['img']."' width='150' height='150' /></font></td>
		<td><font color=\"".$couleur_police."\">".batimod_utf8_encode(substr($data['descr'],0,150))."</font></td>
		<td>
		<a href='editerDiapositive.php?id=".$data['id']."' title='Editer' ><img src='images/edit.png' border=0/></a>
		&nbsp;&nbsp;<a href='deleteDiapositive.php?id=".$data['id']."' title='Supprimer'><img src='images/delete.png' border=0/></a>&nbsp;&nbsp;".$publish."
		</td></tr>";
		
		$i++;
	}

?>