<?php 
session_start();
if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin']=="" || !isset($_SESSION['userPass'])  ||  $_SESSION['userPass']=="")
{
header("Location: index.php");
die();
}
?>