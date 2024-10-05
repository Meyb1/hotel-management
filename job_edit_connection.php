<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $connection->real_escape_string($data['id']);
    $title = $connection->real_escape_string($data['title']);
    $description = $connection->real_escape_string($data['description']);

    $sql = "UPDATE job_posting SET job_title='$title', job_description='$description' WHERE id='$id'";
    if ($connection->query($sql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => "Error updating record: " . $connection->error]);
    }

    $connection->close();
}
?>
