<?php 
include("session.php");

if ($_SERVER['HTTP_REFERER'] == 'http://localhost/pr/werehouse.php') {
    $productname = $_POST['productname'];
    $productquantity = $_POST['productquantity'];
    $cost = $_POST['warehousecost'];
    $categoryname = $_POST['categoryname'];
    $q=mysqli_query($con,"SELECT category_id from category where categoryname='$categoryname'");
    while($row = mysqli_fetch_assoc($q)){
        $catid=$row['category_id'];
    }
    $query = mysqli_query($con, "INSERT INTO warehouse (name,quantity,category_id,cost,user ) VALUES ( '$productname', '$productquantity','$catid','$cost','$user_id')");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} elseif($_SERVER['HTTP_REFERER'] == 'http://localhost/pr/history.php') {
    $productname = $_POST['entername'];
    $productquantity = $_POST['enterQuantity'];
    $cost = $_POST['warehousecost'];
    $warehouse = mysqli_query($con, "SELECT id from warehouse where user='$user_id' and warehouse.name='$productname'");
    while ($row = mysqli_fetch_assoc($warehouse)) {
        $wid = $row['id'];
    }
    $query = mysqli_query($con, "INSERT INTO sell (quantity_sell,price,user_id,waerhouse  ) VALUES ( '$productquantity','$cost','$user_id','$wid')");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    $categoryname = $_POST['catname'];
    $category =mysqli_query($con ,"insert into category(categoryname,userid) values ('$categoryname','$user_id')");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
