<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];

    // Insert form data into the database
    $sql = "INSERT INTO tasks (task_name, task_description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $taskName, $taskDescription);
    $stmt->execute();
    $stmt->close();

    // Redirect to a success page or perform other actions
    header("Location: task_manager.php");
    exit();
}

$conn->close();
?>
