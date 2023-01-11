<?php 
include("session.php");
$rowid= $_POST['rowid'];
if ($_SERVER['HTTP_REFERER'] == 'http://localhost/pr/werehouse.php') {
    $query = mysqli_query($con, "DELETE   FROM  warehouse WHERE id  = '$rowid' ");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} elseif($_SERVER['HTTP_REFERER'] == 'http://localhost/pr/werehouse.php') {
    $query = mysqli_query($con, "DELETE   FROM  sell WHERE sell_id  = '$rowid' ");
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{
    $query = mysqli_query($con, "DELETE   FROM  category WHERE category_id  = '$rowid' ");
    header('Location:http://localhost/pr/add-category.php');
}

?>