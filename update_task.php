<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_task'])) {
        // Handle the update task operation
        $taskId = $_POST['id'];
        $taskName = $_POST['name'];
        $taskDescription = $_POST['description'];

        // Perform the necessary database update
        $sql = "UPDATE tasks SET name = :name, description = :description WHERE id = :taskId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':taskId', $taskId);
        $stmt->bindParam(':name', $taskName);
        $stmt->bindParam(':description', $taskDescription);

        if ($stmt->execute()) {
            // Update successful
        } else {
            // Handle update error
        }
    } else {
        // Handle invalid requests
        http_response_code(400);
        echo 'Bad Request';
    }
}
?>
