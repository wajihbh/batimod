<?php
session_start();
session_unregister("userLogin");
session_unregister("userPass"); 
session_unset(); 
session_destroy(); 
header('Location: index.php') ;
die();
?> 