<?php 
include("session.php");
$rowid= $_POST['rowid'];
$str = $_SERVER['HTTP_REFERER'];
$we = str_contains($str, 'editwarehouse');
$history = str_contains($str, 'edithistory');
if ($we) {
    $query = mysqli_query($con, "DELETE   FROM  warehouse WHERE id  = '$rowid' ");
    header('Location: werehouse.php' );
} elseif($history) {
    $query = mysqli_query($con, "DELETE   FROM  sell WHERE sell_id  = '$rowid' ");
    header('Location: history.php' );

}else{
    $query = mysqli_query($con, "DELETE   FROM  category WHERE category_id  = '$rowid' ");
    header('Location:add-catagory.php');
}

?>