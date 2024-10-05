<?php
$hostname = 'localhost'; 
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=railway", $username, $password);
    echo 'Connected to database<br>';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
