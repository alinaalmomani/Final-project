<?php

// Connect to the MySQL server using the mysqli_connect function
// The function takes in four parameters: server name, username, password, and the name of the database
$con = mysqli_connect("localhost", "root", "", "uniproject");

// Check if the connection was successful
if (mysqli_connect_errno()) {
  // If not, display an error message
  echo "Failed to connect to MySQL: " . mysqli_connect_error() . " | Seems like you haven't created the DATABASE with an exact name";
}
?>