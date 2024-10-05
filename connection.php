<?php
$hostname = 'localhost'; 
$username = 'root';
$password = '';
$databasename = 'paradise_hotel';

try {
    $connection = new msqli($hostname, $username, $password, $databasename);
    if($connectionb->connect_error){
        die("Connection failed: "
        . $connection -> connection_error);
    }
} catch (Exception $e){
    $error = $e->getMessage();
    echo $error;
}
?>
