<?php
// Include the session file to establish a connection to the database
include("session.php");

// Get the value of the selected row to delete
$rowid = $_POST['rowid'];

// Get the URL of the page the form was submitted from
$str = $_SERVER['HTTP_REFERER'];

// Check if the URL contains the string "editwarehouse"
$we = str_contains($str, 'editwarehouse');

// Check if the URL contains the string "edithistory"
$history = str_contains($str, 'edithistory');

// Check where the form was submitted from and delete the corresponding record
if ($we) {
    // Delete the record from the "warehouse" table
    $query = mysqli_query($con, "DELETE   FROM  warehouse WHERE id  = '$rowid' ");

    // Redirect to the warehouse management page
    header('Location: werehouse.php');
} elseif ($history) {
    // Delete the record from the "sell" table
    $query = mysqli_query($con, "DELETE   FROM  sell WHERE sell_id  = '$rowid' ");

    // Redirect to the history page
    header('Location: history.php');
} else {
    // Delete the record from the "category" table
    $query = mysqli_query($con, "DELETE   FROM  category WHERE category_id  = '$rowid' ");

    // Redirect to the category management page
    header('Location:add-catagory.php');
}
?>