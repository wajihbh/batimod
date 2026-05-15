<div id="slider">
        <div id="slideshow">
          <div class="slide_entry">
            <ul>
            <?php 
			$query="select * from diaporama where active=1";
			try {
				$stmt = $pdo->query($query);
				$slides = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
			} catch (PDOException $e) {
				$slides = [];
			}
			
			if(count($slides) > 0)
			{
				foreach($slides as $data)
				{
					echo ' <li>
					<h1 class="main_title">'.batimod_utf8_encode($data['titre']).'</h1>
					<p class="subtitle">'.batimod_utf8_encode($data['descr']).'</p>
					<img src="images/'.$data['img'].'" alt="'.batimod_utf8_encode($data['titre']).'"  />
					</li>';
				}
			}
			else
			{
				echo '<li>
					<h1 class="main_title">BATIMOD</h1>
					<p class="subtitle">Soci�t� de B�timent Moderne</p>
					<img src="images/slider01.jpg" alt="Featured Img 2"  />
				  </li>';
			}
			
			?>
              
            </ul>
            <div id="number"></div>
          </div>
          <!-- end slide_entry_full div -->
        </div>
        <!-- end slideshow_full div -->
      </div>