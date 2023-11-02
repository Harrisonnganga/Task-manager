<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <style media="screen">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 2 0px;
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

        input[type="text"]
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

        .complete-text {
            text-decoration: line-through;
            color: #888;
        }
    </style>
</head>

<body>
<?php require "partials/header.php"; require 'database.php'; ?>

<?php
// Get the task description from the request
$description = $_POST['description'];

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
        $sql = "INSERT INTO tasks (user_id, task_name, task_description
