<?php
// Get the task description from the request
$description = isset($_POST['description']) ? $_POST['description'] : '';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_task'])) {
        // Handle adding a task
        $taskName = $_POST['task_name'];
        $taskDescription = $_POST['task_description'];
        $status = $_POST['status'];

        // Perform the necessary database insertion
        $sql = "INSERT INTO tasks (user_id, task_name, task_description, status) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $_SESSION['user_id'], $taskName, $taskDescription, $status);

        if ($stmt->execute()) {
            // Task added successfully
            header("Location: task_manager.php");
            exit();
        } else {
            // Handle insertion error
        }
    } elseif (isset($_POST['edit_task'])) {
        // Handle editing a task
        $taskId = $_POST['task_id'];
        $taskName = $_POST['task_name'];
        $taskDescription = $_POST['task_description'];
        $status = $_POST['status'];

        // Perform the necessary database update
        $sql = "UPDATE tasks SET task_name = ?, task_description = ?, status = ? WHERE task_id = ? AND user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii", $taskName, $taskDescription, $status, $taskId, $_SESSION['user_id']);

        if ($stmt->execute()) {
            // Task updated successfully
            header("Location: task_manager.php");
            exit();
        } else {
            // Handle update error
        }
    }
}
?>
