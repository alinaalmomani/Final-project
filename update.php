<?php 
include("session.php");
$rowid= $_POST['rowid'];



if ($_SERVER['HTTP_REFERER'] == 'http://localhost/pr/werehouse.php') {
    $column1 = $_POST['Wname'];
    $column2 = $_POST['Wdate'];
    $column3 = $_POST['Wquantity'];
    $column4 = $_POST['Catname'];
    $query = mysqli_query($con, "UPDATE warehouse 
join category  ON warehouse.category_id=category.category_id
SET warehouse.name = '$column1',
    warehouse.date = '$column2',
    warehouse.quantity = '$column3',
    category.categoryname = '$column4'
WHERE warehouse.id = $rowid; ");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/pr/history.php') {
    $column1 = $_POST['Wname'];
    $column2 = $_POST['Wdate'];
    $column3 = $_POST['Wquantity'];
    $column4 = $_POST['Catname'];
    $query = mysqli_query($con, "UPDATE warehouse 
join category  ON warehouse.category_id=category.category_id
join sell on sell.waerhouse = warehouse.id
SET warehouse.name = '$column1',
    sell.time_date = '$column2',
    sell.quantity_sell = '$column3',
    category.categoryname = '$column4'
WHERE warehouse.id = $rowid; ");
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    $editcatname=$_POST['cname'];
    $category=mysqli_query($con ,"UPDATE category set categoryname=' $editcatname' where category_id='$rowid'");

    header('Location: wee.php');
}

