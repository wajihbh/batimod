<?php

	error_reporting(0);
	include("includes/dbConnect.php");
	$query="select * from projets";
	$res=$pdo->query( $query);
	
	while($data=$res->fetch(PDO::FETCH_ASSOC))
	{
		$color = ($i % 2) ? '#B8C8FE' : '#E8E8E8';
		$couleur_police = ($i % 2)  ? '#000000' : '#0069B3';
		if($data['active']=='0'){$publish="<a href='afficherProjet.php?id=".$data['id']."' title='Afficher'><img src='images/afficher.gif' border=0 width=15 height=15 /></a>";}
		else{$publish="<a href='cacherProjet.php?id=".$data['id']."' title='Cacher'><img src='images/cacher.gif' border=0 width=15 height=15 /></a>";}
		
		echo "
		<tr bgcolor='".$color."' align='center'>
		<td><font color=\"".$couleur_police."\">".$data['id']."</font></td>
		<td><font color=\"".$couleur_police."\">".utf8_encode($data['titre'])."</font></td>
		<td><font color=\"".$couleur_police."\">".utf8_encode(substr($data['descr'],0,150))."</font></td>
		<td><font color=\"".$couleur_police."\"><img src='../images/".$data['img']."' /></font></td>
		<td><font color=\"".$couleur_police."\">".utf8_encode($data['Emplacement'])."</font></td>
		<td><font color=\"".$couleur_police."\">".utf8_encode($data['categ'])."</font></td>";
		
		if($data['type']=='1'){$type='REF';}else{$type='PEC';}
		
		echo "
		<td><font color=\"".$couleur_police."\">".$type."</font></td>
		<td>
		<a href='editerProjet.php?id=".$data['id']."' title='Editer' ><img src='images/edit.png' border=0/></a>
		&nbsp;&nbsp;<a href='deleteProjet.php?id=".$data['id']."' title='Supprimer'><img src='images/delete.png' border=0/></a>&nbsp;&nbsp;".$publish."
		</td></tr>";
		
		$i++;
	}

?>