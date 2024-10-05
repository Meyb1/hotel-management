<?php
include "connection.php";

$sql = "SELECT id, job_title, job_description, time_posted FROM job_posting ORDER BY time_posted DESC";
$result = $connection->query($sql);
$jobs = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}

echo json_encode($jobs);
$connection->close();
?>
