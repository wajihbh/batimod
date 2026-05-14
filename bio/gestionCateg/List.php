<?php

declare(strict_types=1);

include 'config.php';

echo '<table border="1">';
echo '<tr>';
echo '<td><b>Id</b></td>';
echo '<td><b>Label</b></td>';
echo '</tr>';

$result = mysqli_query($con, 'SELECT * FROM `categorie`');
if ($result === false) {
    trigger_error(mysqli_error($con));
} else {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $rid = (int) $row['id'];
        $lab = htmlspecialchars((string) $row['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        echo '<tr>';
        echo '<td valign="top">' . $rid . '</td>';
        echo '<td valign="top">' . nl2br($lab) . '</td>';
        echo '<td valign="top"><a href="edit.php?id=' . $rid . '">Edit</a></td><td><a href="delete.php?id=' . $rid . '">Delete</a></td> ';
        echo '</tr>';
    }
    mysqli_free_result($result);
}
echo '</table>';
echo '<a href="new.php">New Row</a>';
