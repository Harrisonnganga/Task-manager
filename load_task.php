<?php
// Establish database connection
$connection = mysqli_connect('localhost', 'username', 'password', 'database');

// Fetch tasks from the database
$query = "SELECT * FROM tasks";
$result = mysqli_query($connection, $query);

// Create an array to store tasks
$tasks = array();

// Loop through the result and add tasks to the array
while ($row = mysqli_fetch_assoc($result)) {
    $tasks[] = $row;
}

// Convert the array to JSON and send the response
echo json_encode($tasks);

// Close the database connection
mysqli_close($connection);
?>
