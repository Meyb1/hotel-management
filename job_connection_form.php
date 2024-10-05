<?php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $time_posted = date('Y-m-d H:i:s');

    $sql = "INSERT INTO your_table_name (job_title, job_description, time_posted) VALUES (:job_title, :job_description, :time_posted)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(['job_title' => $job_title, 'job_description' => $job_description, 'time_posted' => $time_posted]);

    echo "New record created successfully<br>";
}

?>
