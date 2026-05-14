<?php

declare(strict_types=1);

require __DIR__ . '/config.php';

$result = mysqli_query($con, 'SELECT * FROM `categorie`') or trigger_error(mysqli_error($con), E_USER_ERROR);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo '<p>' . htmlspecialchars((string) ($row['label'] ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
}
