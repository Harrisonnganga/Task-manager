<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'champ';

try {
  $conn = new PDO("mysql:host=$host;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
