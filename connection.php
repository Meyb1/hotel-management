<?php
$hostname = 'localhost'; 
$username = 'root';
$password = 'root';
$databasename = 'paradise_hotel';
try {
    $connection = new mysqli($hostname, $username, $password, $databasename);
    if ($connection->connect_error) { 
        die("Connection failed: " . $connection->connect_error);
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}
?>
