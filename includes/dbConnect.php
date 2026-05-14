<?php

declare(strict_types=1);

require_once __DIR__ . '/encoding_compat.php';


$con = @mysqli_connect(
    'batimodmain.mysql.db',
    'batimodmain',
    'MRJDk30CtSv4GIBDGoMI',
    'batimodmain',
);

if (!$con instanceof mysqli) {
    error_log('batimod db: connection failed — ' . mysqli_connect_error());
    http_response_code(503);
    exit('Service temporarily unavailable.');
}

mysqli_set_charset($con, 'utf8mb4');
$handler = true;
