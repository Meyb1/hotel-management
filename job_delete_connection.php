<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $connection->real_escape_string($data['id']);

    $sql = "DELETE FROM job_posting WHERE id='$id'";
    if ($connection->query($sql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => "Error deleting record: " . $connection->error]);
    }

    $connection->close();
}
?>
