<?php
// Include the session file to establish a connection to the database
include("session.php");

// Get the value of the selected row to edit
$rowid = $_POST['rowid'];

// Get the URL of the page the form was submitted from
$str = $_SERVER['HTTP_REFERER'];

// Check if the URL contains the string "editwarehouse"
$we = str_contains($str, 'editwarehouse');

// Check if the URL contains the string "edithistory"
$history = str_contains($str, 'edithistory');

// Check where the form was submitted from and update the corresponding record
if ($we) {
    // Get the new data from the form
    $column1 = $_POST['Wname'];
    $column2 = $_POST['Wdate'];
    $column3 = $_POST['Wquantity'];
    $column4 = $_POST['Catname'];
    $column5 = $_POST['cost'];

    // Update the record in the "warehouse" table
    $query = mysqli_query($con, "UPDATE warehouse 
    join category  ON warehouse.category_id=category.category_id
    SET warehouse.name = '$column1',
        warehouse.date = '$column2',
        warehouse.quantity = '$column3',
        category.categoryname = '$column4',
        warehouse.cost = '$column5'
    WHERE warehouse.id = $rowid; ");
    header('Location: werehouse.php');
} elseif ($history) {
    // Get the new data from the form
    $column1 = $_POST['Wname'];
    $column2 = $_POST['Sdate'];
    $column3 = $_POST['Squa'];
    $column4 = $_POST['cname'];
    $column5 = $_POST['Scost'];

    // Update the record in the "sell" table
    $query = mysqli_query($con, "UPDATE warehouse 
    join category  ON warehouse.category_id=category.category_id
    join sell ON warehouse.id= sell.warehouse
    SET warehouse.name = '$column1',
        sell.time_date = '$column2',
        sell.quantity_sell = '$column3',
        sell.price ='$column5',
        category.categoryname = '$column4'
    WHERE sell.sell_id = $rowid; ");

    header('Location: history.php');
} else {
    // Get the new data from the form
    $editcatname = $_POST['cname'];

    // Update the record in the "category" table
    $category = mysqli_query($con, "insert into category(categoryname,userid) values ('$categoryname','$user_id')");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}?>
