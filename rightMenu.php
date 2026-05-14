<?php 
$query='select * from categorie';
$res=mysqli_query($con, $query);
if($res)
{
?>
<div id="left">
  <div id="menu">
    <ul id="sliding-navigation">
		<?php 
        while($data=mysqli_fetch_assoc($res))
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