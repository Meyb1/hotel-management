<?php
$sql = "SELECT * FROM pradise_hotel";
$stmt = $dbh->query($sql);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $row['id'] . " - Job Title: " . $row['job_title'] . " - Description: " . $row['job_description'] . " - Time Posted: " . $row['time_posted'] . "<br>"; 
}

$dbh = null;
?>