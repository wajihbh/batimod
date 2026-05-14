<?php

$con = @mysqli_connect(
    "batimodmain.mysql.db",
    "batimodmain",
    "MRJDk30CtSv4GIBDGoMI",
    "batimodmain"
);

if (!$con instanceof mysqli) {
    error_log('batimod bio db: connection failed — ' . mysqli_connect_error());
    http_response_code(503);
    exit('Service temporarily unavailable.');
}

mysqli_set_charset($con, 'utf8mb4');
$handler = true;