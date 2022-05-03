<?php

// MySQL connection
$hostName = "mysql.eecs.ku.edu";
$userName = "p695k530";
$password = "eFeitu9e";
$databaseName = "p695k530";
$conn = new mysqli($hostName, $userName, $password, $databaseName);

// Check connection
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}

?>
