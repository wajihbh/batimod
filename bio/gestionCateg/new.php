<? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con, $value); } 
$sql = "INSERT INTO `categorie` ( `label`  ) VALUES(  '{$_POST['label']}'  ) "; 
mysqli_query($con, $sql) or die(mysqli_error($con)); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Label:</b><br /><input type='text' name='label'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
