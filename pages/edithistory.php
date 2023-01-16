<?php
// including session.php file for user authentication
include("session.php");
$businessname = mysqli_query($con, "SELECT  businessname  FROM user  where id='$user_id'");
// this gets the business name
while ($row = mysqli_fetch_assoc($businessname)) {
    $bname = $row['businessname'];
};
unset($editd);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,600;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/translate.js"></script>
    <link href="../css/css.css" rel="stylesheet" />
    <title>Edit/Delete Row</title>
</head>
<!--this calls a function in js to translate the website-->

<body id="text" onload="translate('en','lang-tag')">
    <section>
        <div class=" navbar navbar-expand-sm navbar-light bg-lightPink shadow text-center">
            <div class="container p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span><img src="../logo/logo.png" alt="" width="25"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbar">
                    <ul class="navbar-nav mt-2 mt-lg-0 " id="navigation">
                        <li class="navbar-brand" value=" 1">
                            <img class="img-fluid" src="../logo/logo.png" alt="" width="25">
                        </li>
                        <li class="nav-item " value=" 2">
                            <a class="nav-link" href=" dashboard.php" lang-tag="dashboared"></a>
                        </li>
                        <li class="nav-item " value="3">
                            <a class="nav-link" href="add-catagory.php" lang-tag="addCategory"></a>
                        </li>
                        <li class="nav-item " value="4">
                            <a class="nav-link" href="history.php" lang-tag="expenseHistory"></a>
                        </li>
                        <li class="nav-item " value="5">
                            <a class="nav-link" href="werehouse.php" lang-tag="werehouse"></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0" id="user">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25">
                                <?php echo $bname; ?>
                            </a>
                            <ol class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#custom" lang-tag="customize"></li>
                                <li><a class="dropdown-item" href="profile.php" lang-tag="profile"></a></li>
                                <li><a class="dropdown-item" href="logout.php" lang-tag="logout"></a></li>
                            </ol>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal fade" id="custom" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" lang-tag="customize" id="customModalLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container  mx-auto text-center">
                                <div class="conatiner ">
                                    <label lang-tag="changeLang"></label>
                                    <div class="d-flex justify-content-center">
                                        <a class=" btn m-3" onclick="en()" id="enTranslator" href="javascript:void(0);">EN</a>
                                        <a class=" btn m-3" onclick="ar()" id="arTranslator" href="javascript:void(0);">AR</a>
                                    </div>
                                </div>
                                <div class="container">
                                    <label lang-tag="changeFont"></label>
                                    <div class="size-range text-center  pt-3 ">
                                        <input onchange="sizeChange()" class="form-range w-50" id="font-size" type="range" min="1" max="5">
                                    </div>
                                </div>
                                <div class="container">
                                    <p lang-tag="changeTheme"></p>
                                    <div class="form-check form-switch pt-3 text-center ps-0">
                                        <input onchange="toggleTheme()" class="form-check-input float-none checkbox" type="checkbox" role="switch" id="myCheckBox" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container p-5 m-auto">
            <?php
            if (isset($_GET['edit'])) {
                //if the user has pressed the edit button
                $rowId = $_GET['edit'];
                $editd = mysqli_query($con, "SELECT warehouse.name as name  , sell.time_date as date, sell.quantity_sell as quantity  , sell.price as cost,category.categoryname as j FROM warehouse JOIN category  ON warehouse.category_id=category.category_id  join sell on sell.warehouse = warehouse.id where sell.sell_id='$rowId'");
                echo '<p class="sure text-center" lang-tag="Esure?"></p>';
                echo '<form action="update.php" method="post">';
                //the form is to update the row
                echo '<input type="hidden" value=' . $rowId . ' name="rowid">';
                echo '<table class="table text-darkBlue" >
                    <thead>
                        <tr>
                            <th lang-tag="product"></th>
                            <th lang-tag="date"></th>
                            <th lang-tag="quantity"></th>
                            <th lang-tag="cost"></th>
                            <th lang-tag="category"></th>
                        </tr>
                    </thead>';
                while ($row = mysqli_fetch_assoc($editd)) {
                    echo '
                <tr><td><input value="' . $row['name'] . '" name="Wname" class="form-control"></td>';
                    echo '<td><input value="' . $row['date'] . '" name="Sdate" class="form-control"></td>';
                    echo '<td><input value="' . $row['quantity'] . '" name="Squa" class="form-control"></td>';
                    echo '<td><input value="' . $row['cost'] . '" name="Scost" class="form-control"></td>';
                    echo '<td><input value="' . $row['j'] . '" name="cname" class="form-control"></td></tr></table>';
                };
                echo ' <button class="btn btn-orange rounded-pill" type="submit" lang-tag="edit"></button></form>';
            } else {
                //if the user has pressed the delete button 
                $rowId = $_GET['del'];
                $editd = mysqli_query($con, "SELECT warehouse.name as name  , warehouse.date as date, warehouse.quantity as quantity  , sell.price as cost,category.categoryname as j FROM warehouse JOIN category  ON warehouse.category_id=category.category_id  join sell on sell.warehouse = warehouse.id where sell.sell_id='$rowId'");
                echo '<p class="sure text-center" lang-tag="sure?"></p>';
                echo '<form action="delete.php" method="post">';
                //the form is to delete the row
                echo '<input type="hidden" value=' . $rowId . ' name="rowid">';
                echo '<table class="table text-darkBlue" >
                    <thead>
                        <tr>
                            <th lang-tag="product"></th>
                            <th lang-tag="date"></th>
                            <th lang-tag="quantity"></th>
                            <th lang-tag="cost"></th>
                            <th lang-tag="category"></th>
                        </tr>
                    </thead>';
                while ($row = mysqli_fetch_assoc($editd)) {
                    echo '<tr><td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['cost'] . '</td>';
                    echo '<td>' . $row['j'] . '</td></tr></table>';
                };
                echo ' <button class="btn btn-orange rounded-pill" type="submit" lang-tag="delete"></button></form>';
            }
            ?>
        </div>
    </section>
</body>
<script src="../js/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>