<?php

	
	$query="select * from masse where projet='".$idProj."'";
	$res=mysqli_query($con, $query);
	
	while($data=mysqli_fetch_assoc($res))
	{
		$color = ($i % 2) ? '#B8C8FE' : '#E8E8E8';
		$couleur_police = ($i % 2)  ? '#000000' : '#0069B3';
		if($data['active']=='0'){$publish="<a href='afficherPlanMasse.php?id=".$data['id']."&proj=".$idProj."' title='Afficher'><img src='images/afficher.gif' border=0 width=15 height=15 /></a>";}
		else{$publish="<a href='cacherPlanMasse.php?id=".$data['id']."&proj=".$idProj."' title='Cacher'><img src='images/cacher.gif' border=0 width=15 height=15 /></a>";}
		
		echo "
		<tr bgcolor='".$color."' align='center'>
		<td><font color=\"".$couleur_police."\">".$data['id']."</font></td>
		<td><font color=\"".$couleur_police."\"> <img src='../".$data['path']."' width='150' height='150' /></font></td>
		<td><font color=\"".$couleur_police."\">".batimod_utf8_encode($data['titre'])."</font></td>
		<td><font color=\"".$couleur_police."\">".batimod_utf8_encode(substr($data['descr'],0,150))."</font></td>
		<td>
		<a href='editerPlanMasse.php?id=".$data['id']."&proj=".$idProj."' title='Editer' ><img src='images/edit.png' border=0/></a>
		&nbsp;&nbsp;<a href='deletePlanMasse.php?id=".$data['id']."&proj=".$idProj."' title='Supprimer'><img src='images/delete.png' border=0/></a>&nbsp;&nbsp;".$publish."
		</td></tr>";
		
		$i++;
	}

?>