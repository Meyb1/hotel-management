<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // For demonstration, using hardcoded credentials
    if ($username === 'admin' && $password === 'password123') {
        $_SESSION['username'] = $username;
        header('Location: maindashboard.php');
        exit();
    } else {
        $error = 'Invalid credentials';
    }
}
?>