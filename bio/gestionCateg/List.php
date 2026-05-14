<?php

declare(strict_types=1);

require __DIR__ . '/config.php';

try {
    $stmt = $pdo->query('SELECT * FROM `categorie`');
    if ($stmt === false) {
        trigger_error('Query failed', E_USER_ERROR);
    }
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<p>' . htmlspecialchars((string) ($row['label'] ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
    }
} catch (PDOException $e) {
    trigger_error($e->getMessage(), E_USER_ERROR);
}
