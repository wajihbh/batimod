<?php

declare(strict_types=1);

require_once __DIR__ . '/encoding_compat.php';

$configFile = __DIR__ . '/db_config.local.php';
if (!is_readable($configFile)) {
    $configFile = __DIR__ . '/../db_config.local.php';
}
if (is_readable($configFile)) {
    /** @var array{host:string,user:string,password:string,database:string} $dbConfig */
    $dbConfig = require $configFile;
} else {
    /** @var array{host:string,user:string,password:string,database:string} $dbConfig */
    $dbConfig = require __DIR__ . '/db_config.local.example.php';
}

$driverOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = sprintf(
    'mysql:host=%s;dbname=%s;charset=utf8mb4',
    $dbConfig['host'],
    $dbConfig['database']
);

try {
    $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['password'], $driverOptions);
} catch (PDOException $e) {
    error_log('batimod db: connection failed — ' . $e->getMessage());
    http_response_code(503);
    exit('Service temporarily unavailable.');
}

if (!function_exists('batimod_pdo_escape')) {
    /**
     * Échappement pour SQL concaténé hérité (préférer les requêtes préparées).
     */
    function batimod_pdo_escape(PDO $pdo, string $value)
    {
        $q = $pdo->quote($value);

        return substr($q, 1, -1);
    }
}
