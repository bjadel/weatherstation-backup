<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 0);
ini_set('error_log', 'php_error.log');

echo "<h1>Wetter, Wetter, Wetter!</h1>";
try {
    $file_db = new PDO('sqlite:../measuranddb');
    if (!$file_db) error_log("");

    $result = $file_db->query('SELECT * FROM measurand ORDER BY id DESC');
    if (!$result) error_log("Cannot execute query.");

    echo "<table>";
    echo "<th>Datum</th>";
    echo "<th>Ort</th>";
    echo "<th>Sensor</th>";
    echo "<th>Wert</th>";
    
    foreach($result as $row) {
        echo "<tr>";
        echo "<td>";
        echo $row['CREATIONDATE'];
        echo "</td>";
        echo "<td>";
        echo $row['LOCATION_ID'];
        echo "</td>";
        echo "<td>";
        echo $row['SENSOR_ID'];
        echo "</td>";
        echo "<td>";
        echo $row['VALUE'];
        echo " ";
        echo $row['UNIT'];
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

    $file_db = null;
} catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
}
?>
