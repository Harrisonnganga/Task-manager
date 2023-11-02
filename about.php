<?php
require "partials/header.php";
require "partials/head.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
 ?>
 <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      text-align: center;
    }

    h1 {
      background-color: #fff;
      color: #333;
      padding: 10px;
    }

    p {
      color: #333;
      font-size: 18px;
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      text-align: left;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      line-height: 1.6;
    }
  </style>
<h1>About</h1>
<h5>Simplify your workflow</h5>
<p class="content">Task Manager boasts an intuitive and user-friendly interface that allows you to effortlessly navigate through its various features.
  The main dashboard provides a clear overview of your tasks,
   allowing you to easily add, edit, and mark tasks as completed.
   The interface is designed to be responsive, ensuring a seamless experience across different devices, including desktops, tablets, and mobile phones.
 </p>
