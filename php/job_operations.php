<?php
include "connection.php";

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'fetch') {
    $sql = "SELECT * FROM job_posting ORDER BY time_posted DESC";
    $result = $connection->query($sql);
    
    $jobs = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jobs[] = $row;
        }
    }
    echo json_encode($jobs);
} elseif ($action == 'delete') {
    $jobId = $_GET['id'];
    $sql = "DELETE FROM job_posting WHERE id = $jobId";
    
    if ($connection->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $connection->real_escape_string($_POST['job_title']);
    $job_description = $connection->real_escape_string($_POST['job_description']);
    $time_posted = date('Y-m-d H:i:s');

    $sql = "INSERT INTO job_posting (job_title, job_description, time_posted) VALUES ('$job_title', '$job_description', '$time_posted')";

    if ($connection->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>
