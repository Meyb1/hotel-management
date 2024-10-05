<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $connection->real_escape_string($_POST['job_title']);
    $job_description = $connection->real_escape_string($_POST['job_description']);
    $time_posted = date('Y-m-d H:i:s');

    $sql = "INSERT INTO job_posting (job_title, job_description, time_posted) VALUES ('$job_title', '$job_description', '$time_posted')";

    if ($connection->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }   

  
    $connection->close();
}
?>
