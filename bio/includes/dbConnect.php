<?php

$configFile = dirname(__DIR__, 2) . '/includes/db_config.local.php';
if (is_readable($configFile)) {
    /** @var array{host:string,user:string,password:string,database:string} $dbConfig */
    $dbConfig = require $configFile;
} else {
    /** @var array{host:string,user:string,password:string,database:string} $dbConfig */
    $dbConfig = require dirname(__DIR__, 2) . '/includes/db_config.local.example.php';
}

$con = @mysqli_connect(
    $dbConfig['host'],
    $dbConfig['user'],
    $dbConfig['password'],
    $dbConfig['database']
);

if (!$con instanceof mysqli) {
    error_log('batimod bio db: connection failed — ' . mysqli_connect_error());
    http_response_code(503);
    exit('Service temporarily unavailable.');
}

mysqli_set_charset($con, 'utf8mb4');
$handler = true;
