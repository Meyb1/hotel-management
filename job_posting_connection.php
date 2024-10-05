<?php
include 'connection.php';

// Fetch job postings from the database
$sql = "SELECT * FROM job_posting ORDER BY time_posted DESC";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="job-card">';
        echo '<h3>' . htmlspecialchars($row['job_title']) . '</h3>';
        echo '<p>' . htmlspecialchars($row['job_description']) . '</p>';
        echo '<span class="time-posted">' . date("F j, Y, g:i a", strtotime($row['time_posted'])) . '</span>';
        echo '</div>';
    }
} else {
    echo '<p>No job postings available.</p>';
}

$connection->close();
?>