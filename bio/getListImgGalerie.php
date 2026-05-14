<?php

	
	$query="select * from gallerie where projet='".$idProj."'";
	$res=mysqli_query($con, $query);
	$i=1;
	if(mysqli_num_rows($res)>0)
	{
		while($data=mysqli_fetch_assoc($res))
		{
			$color = ($i % 2) ? '#B8C8FE' : '#E8E8E8';
			$couleur_police = ($i % 2)  ? '#000000' : '#0069B3';
			if($data['active']=='0'){$publish="<a href='afficherImgGal.php?id=".$data['id']."&proj=".$idProj."' title='Afficher'><img src='images/afficher.gif' border=0 width=15 height=15 /></a>";}
			else{$publish="<a href='cacherImgGal.php?id=".$data['id']."&proj=".$idProj."' title='Cacher'><img src='images/cacher.gif' border=0 width=15 height=15 /></a>";}
			
			echo "
			<tr bgcolor='".$color."' align='center'>
			<td><font color=\"".$couleur_police."\">".$i."</font></td>
			<td><font color=\"".$couleur_police."\"> <img src='../".$data['path']."' /></font></td>
			<td><font color=\"".$couleur_police."\">".batimod_utf8_encode($data['titre'])."</font></td>
			<td><font color=\"".$couleur_police."\">".batimod_utf8_encode($data['descr'])."</font></td>
			<td>
			<a href='editerImgGalerie.php?id=".$data['id']."&proj=".$idProj."' title='Editer' ><img src='images/edit.png' border=0/></a>
			&nbsp;&nbsp;<a href='deleteImgGalerie.php?id=".$data['id']."&proj=".$idProj."' title='Supprimer'><img src='images/delete.png' border=0/></a>&nbsp;&nbsp;".$publish."
			</td></tr>";
			
			$i++;
		}
	}
	else
	{
		echo "<div class='info'>Aucun image trouv�e</div>";
	}

?>