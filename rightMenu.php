<?php 
$query='select * from categorie';
$res=$pdo->query( $query);
if($res)
{
?>
<div id="left">
  <div id="menu">
    <ul id="sliding-navigation">
		<?php 
        while($data=$res->fetch(PDO::FETCH_ASSOC))
        {
            echo '<li class="sliding-element"><a href="detailCategorie.php?cat='.$data['id'].'">'.utf8_encode($data['label']).'</a></li>';
        }
        ?>
    </ul>
  </div>
</div>
<?php 
}
?>