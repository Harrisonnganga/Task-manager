<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <style media="screen">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px; /* Fixed typo in 'padding' value */
            background-color: #f2f2f2;
        }
        header a {
            text-decoration: none;
            color: #333;
        }

        .task-manager {
            max-width: 700px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

        }

        h1 {
            text-align: center;
        }

        .task-form {
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], /* Added a comma between selectors */
        textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #0098cb;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .task-list {
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .completed-text { /* Updated class name from 'complete-text' to 'completed-text' */
            text-decoration: line-through;
            color: #888;
        }
    </style>
</head>
<body>

<?php
require "partials/header.php";
require 'database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

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

<div class="task-manager">
    <h2>ToDo</h2>
    <div class="task-form">
        <h5>Add New Task</h5>
        <form id="task-form">
            <div class="form-group">
                <label for="task-name">Task Name:</label>
                <input type="text" id="task-name" required>
            </div>
            <div class="form-group">
                <label for="task-description">Description:</label>
                <textarea id="task-description" required></textarea>
            </div>
            <button type="submit">Add Task</button>
        </form>
    </div>
    <div class="task-list">
        <h4>Task List</h4>
        <ul id="task-list">
            <!-- Tasks will be dynamically added here -->
        </ul>
    </div>
</div>


<script src="../assets/js/main.js" charset="utf-8"></script>
</body>
</html>
