<?php
require "partials/head.php";
require "partials/header.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<style>
h1 {
  background-color: #fff;
  color: #333;
  padding: 10px;
}
</style>

<h1>Welcome to the dashboard</h1>

<a href="home.php">Home</a>
<a href="About.php">About Us</a>

</body>
</html>
