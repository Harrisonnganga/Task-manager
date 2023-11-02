<?php
session_start
// for user authontification
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
// Establish database connection
$connection = mysqli_connect('localhost', 'username', 'password', 'database');

// Get the task ID from the request
$taskId = $_POST['taskId'];

// Delete the task from the database
$query = "DELETE FROM tasks WHERE id = '$taskId'";
mysqli_query($connection, $query);

// Close the database connection
mysqli_close($connection);
?>
