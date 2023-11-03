<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $taskId = $_POST['id'];
  $taskName = $_POST['name'];
  $taskDescription = $_POST['description'];

  require 'database.php';

  $sql = "UPDATE tasks SET name = :name, description = :description WHERE id = :taskId";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':name', $taskName);
  $stmt->bindParam(':description', $taskDescription);
  $stmt->bindParam(':id', $taskId);

  if ($stmt->execute()) {
   echo 'Task edited successfully';
   header("location: task_manager.php")
  } else {
   echo 'There was an error editing the task';
  }
} else {
    http_response_code(400);
    echo 'Bad Request';
}
?>
