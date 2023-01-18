<?php 
// Include the session file to establish a connection to the database
include("session.php");
// Get the URL of the page the form was submitted from
if ($_SERVER['HTTP_REFERER'] == 'http://localhost/pr/pages/werehouse.php') {
    // Get the value of the input to insert them in the row
    $productname = $_POST['productname'];
    $productquantity = $_POST['productquantity'];
    $cost = $_POST['warehousecost'];
    $categoryname = $_POST['categoryname'];
    // select the record that has the category name
    $q=mysqli_query($con,"SELECT category_id from category where categoryname='$categoryname'");
    while($row = mysqli_fetch_assoc($q)){
        $catid=$row['category_id'];
    }
    // insert the record into the "warehouse" table
    $query = mysqli_query($con, "INSERT INTO warehouse (name,quantity,category_id,cost,user ) VALUES ( '$productname', '$productquantity','$catid','$cost','$user_id')");
    // Redirect to the warehouse page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} elseif($_SERVER['HTTP_REFERER'] == 'http://localhost/pr/pages/history.php') {
     // Get the value of the input to insert them in the row
    $productname = $_POST['entername'];
    $productquantity = $_POST['enterQuantity'];
    $cost = $_POST['warehousecost'];
    // select the record that has the product name
    $warehouse = mysqli_query($con, "SELECT id from warehouse where user='$user_id' and warehouse.name='$productname'");
    while ($row = mysqli_fetch_assoc($warehouse)) {
        $wid = $row['id'];
    }
    // insert the record into the "sell" table
    $query = mysqli_query($con, "INSERT INTO sell (quantity_sell,price,user_id,warehouse  ) VALUES ( '$productquantity','$cost','$user_id','$wid')");
     // Redirect to the history page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    // Get the value of the input to insert them in the row
    $categoryname = $_POST['catname'];
    // insert the record into the "category" table
    $category =mysqli_query($con ,"INSERT INTO category(categoryname,userid) VALUES ('$categoryname','$user_id')");
    // Redirect to the category page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
