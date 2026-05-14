<div id='cssmenu'>
      <ul>
        <li><a href="index.php"><img style="margin-top:10px;" src="images/home_icon.png" /></a></li>
        <li><a href="presentation.php"><span>PRESENTATION</span></a></li>
        <li><a href="services.php"><span>NOS SERVICES</span></a></li>
        <li class='has-sub '><a href="references.php"><span>REFERENCES</span></a>
          <ul>
          <?php 
		  
		  $queryCat='select * from categorie';
		  $resCat=$pdo->query( $queryCat);
		  if($resCat)
		  {
			  while($dataCat=$resCat->fetch(PDO::FETCH_ASSOC))
			  {
				  echo '<li class="has-sub"><a href="detailCategorie.php?cat='.$dataCat['id'].'"><span>'.batimod_utf8_encode($dataCat['label']).'</span></a>';
				  $queryProject='select * from projets where categ='.$dataCat['id'].' and type=1 and active=1';
				  $resProject=$pdo->query( $queryProject);
				  echo '<ul>';
				  while($dataProject=$resProject->fetch(PDO::FETCH_ASSOC))
				  {
					 echo '<li><a href="detailReference.php?id='.$dataProject['id'].'"><span>'.batimod_utf8_encode($dataProject['titre']).'</span></a></li>';
				  }
				  echo '</ul>';
				  echo '</li>';
			  }
		  }
		  else
		  {
		  echo '<li>---</li>';
		  }
		  ?>
          
          
          
           <!-- <li class='has-sub '><a href="detailCategorie.php?cat=1"><span>Batiments Habitation</span></a>
              <ul>
                <li><a href="detailReference.php?id=1"><span>Jardin de Denden</span></a></li>
                <li><a href='detailReference.php?id=2'><span>El wadhah</span></a></li>
                <li><a href='detailReference.php?id=3'><span>El bahja</span></a></li>
                <li><a href='detailReference.php?id=4'><span>Layeli Ichbilya</span></a></li>
                <li><a href='detailReference.php?id=5'><span>hilton</span></a></li>
                <li><a href='detailReference.php?id=6'><span>odyssee</span></a></li>
                <li><a href='detailReference.php?id=7'><span>Slim</span></a></li>
                <li><a href='detailReference.php?id=8'><span>Résidence Malika</span></a></li>
                <li><a href='#'><span>Résidence Imen</span></a></li>
                <li><a href='#'><span>Mahou</span></a></li>
                <li><a href='#'><span>Socodim</span></a></li>
                <li><a href='#'><span>Medina</span></a></li>
                <li><a href='#'><span>Sivia Simpar</span></a></li>
              </ul>
            </li> -->
            
            
            <!--<li class='has-sub '><a href="batiments-administratifs.php"><span>Batiments Administratifs</span></a>
              <ul>
                <li><a href='#'><span>Local du Ministére de l'industrie</span></a></li>
                <li><a href='#'><span>Nozha</span></a></li>
                <li><a href='#'><span>Ministére de l'industrie de l'énergie et les petites et moyennes entreprises</span></a></li>
                <li><a href='#'><span>Immobilière Ennozha</span></a></li>
                <li><a href='#'><span>Nozha</span></a></li>
                <li><a href='#'><span>Le petit Palais</span></a></li>
                <li><a href='#'><span>Tunisie autoroutes</span></a></li>
                <li><a href='#'><span>CNSS</span></a></li>
                <li><a href='#'><span>Safsaf</span></a></li>
              </ul>
            </li> -->
            <!--<li class='has-sub '><a href="etablissements-sante.php"><span>Etablissements de Santé</span></a>
              <ul>
                <li><a href='#'><span>Centre des dangereuses</span></a></li>
                <li><a href='#'><span>Hoiptal régional Ariana</span></a></li>
                <li><a href='#'><span>Hopital Régional Ben Arous</span></a></li>
                <li><a href='#'><span>Hopital Habib Thameur</span></a></li>
              </ul>
            </li> -->
            <!--<li class='has-sub '><a href="etablissements-educatifs.php"><span>Etablissements Educatifs</span></a>
              <ul>
                <li><a href='#'><span>Ibn Zaydoun - Manouba</span></a></li>
                <li><a href='#'><span>Sidi Thabet</span></a></li>
                <li><a href='#'><span>El Mourouj 3</span></a></li>
                <li><a href='#'><span>Cartier Ibn Sina</span></a></li>
                <li><a href='#'><span>Mornag</span></a></li>
              </ul>
            </li> -->
            <!--<li class='has-sub '><a href="projet-cours.php"><span>Projets en cours de construction</span></a>
              <ul>
                <li><a href='#'><span>Diar Omar</span></a></li>
                <li><a href='#'><span>Société des voitures</span></a></li>
                <li><a href='#'><span>Essoukna</span></a></li>
                <li><a href='#'><span>Immeuble Fawanis</span></a></li>
              </ul>
            </li> -->
            <!--<li class='has-sub '><a href="complexes-sportifs.php"><span>Complexes Sportifs</span></a>
              <ul>
                <li><a href='#'><span>Salle Couverte   -  Soukra </span></a></li>
                <li><a href='#'><span>Stade Gazonné  -  Soukra</span></a></li>
                <li><a href='#'><span>Salle Couverte Manouba</span></a></li>
                <li><a href='#'><span>Stade Gazonné  -  Manouba</span></a></li>
              </ul>
            </li> -->
            <!--<li class='has-sub '><a href="etablissements-etatiques.php"><span>Etablissements étatiques</span></a>
              <ul>
                <li><a href='#'><span>Ariana </span></a></li>
                <li><a href='#'><span>Nabeul</span></a></li>
              </ul>
            </li> -->
          </ul>
        </li>
        <li><a href="projet-cours.php"><span>PROJET EN COURS</span></a></li>
        <li><a href="contact.php"><span>CONTACT</span></a></li>
      </ul>
      <div id="recherche">
        <form action="rstRecherche.php" method="post" name="recherch">
          <input type="text"  name="rech" value="RECHERCHE" class="txtfield" onBlur="javascript:if(this.value==''){this.value=this.defaultValue;}" onFocus="javascript:if(this.value==this.defaultValue){this.value='';}" />
          <input type="button" value="" class="button"  onclick="return verifRecherche()"/>
        </form>
      </div>
    </div>