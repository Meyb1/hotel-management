<?php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $time_posted = date('Y-m-d H:i:s');

    $sql = "INSERT INTO job_posting VALUES ($job_title, $job_description, $time_posted)";

    if ($connection->query($sql) === TRUE) {
        echo "record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }   
    mysqli_close($conn);
}
?>
