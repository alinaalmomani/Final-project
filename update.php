<?php 
include("session.php");
$rowid= $_POST['rowid'];

$str= $_SERVER['HTTP_REFERER'];
$we= str_contains($str, 'editwarehouse');
$history= str_contains($str, 'edithistory');
if ($we) {
    $column1 = $_POST['Wname'];
    $column2 = $_POST['Wdate'];
    $column3 = $_POST['Wquantity'];
    $column4 = $_POST['Catname'];
    $column5 = $_POST['cost'];
    $query = mysqli_query($con, "UPDATE warehouse 
join category  ON warehouse.category_id=category.category_id
SET warehouse.name = '$column1',
    warehouse.date = '$column2',
    warehouse.quantity = '$column3',
    category.categoryname = '$column4',
    warehouse.cost = '$column5'
WHERE warehouse.id = $rowid; ");
    header('Location: werehouse.php' );
} elseif ($history) {
    $column1 = $_POST['Wname'];
    $column2 = $_POST['Sdate'];
    $column3 = $_POST['Squa'];
    $column4 = $_POST['cname'];
    $column5 = $_POST['Scost'];
    $query = mysqli_query($con, "UPDATE warehouse 
join category  ON warehouse.category_id=category.category_id
join sell ON warehouse.id= sell.warehouse
SET warehouse.name = '$column1',
    sell.time_date = '$column2',
    sell.quantity_sell = '$column3',
    sell.price ='$column5',
    category.categoryname = '$column4'
WHERE sell.sell_id = $rowid; ");
    
    header('Location: history.php' );
}else{
    $editcatname=$_POST['cname'];
    $category=mysqli_query($con ,"UPDATE category set categoryname=' $editcatname' where category_id='$rowid'");

    header('Location: add-catagory.php');
}

