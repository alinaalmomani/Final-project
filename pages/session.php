<?php

// Include the config file which contains the database connection details
include("config.php");

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
  // If not, redirect to the login page
  header("Location:login.php");
  exit();
}

// Get the email of the logged-in user from the session
$sess_email = $_SESSION["email"];

// Build the SQL query to select the user's information from the database
$sql = "SELECT id, firstname, lastname, email  ,profile_path ,  businessname FROM user  WHERE email = '$sess_email'";

// Execute the query
$result = $con->query($sql);

// Check if the query returns any rows
if ($result->num_rows > 0) {
  // If it does, output the data of each row
  while ($row = $result->fetch_assoc()) {
    // Assign the selected values to variables
    $user_id = $row["id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $businessname = $row["businessname"];
    $username = $row["firstname"] . " " . $row["lastname"];
    $useremail = $row["email"];
    $userprofile = "../uploads/" . $row["profile_path"];
  }
} else {
  // If the query doesn't return any rows, assign default values to variables
  $userid = "GHX1Y2";
  $username = "Jhon Doe";
  $useremail = "mailid@domain.com";
  $businessname = "expense";
  $userprofile = "Uploads/default_profile.png";
}?>
