<?php
include("config.php");
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:login.php");
  exit();
}

$sess_email = $_SESSION["email"];
$sql = "SELECT id, firstname, lastname, email  ,profile_path ,  businessname FROM user  WHERE email = '$sess_email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $user_id = $row["id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $businessname = $row["businessname"];
    $username = $row["firstname"] . " " . $row["lastname"];
    $useremail = $row["email"];
    $userprofile = "uploads/" . $row["profile_path"];
  }
} else {
  $userid = "GHX1Y2";
  $username = "Jhon Doe";
  $useremail = "mailid@domain.com";
  $businessname = "expense";
  $userprofile = "Uploads/default_profile.png";
}
