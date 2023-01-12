<?php

include("session.php");
unset($sql);
unset($query);
// if (isset($_POST['submit'])) {
//     $key = mysqli_real_escape_string($con, $_POST['in']);
//     $query = mysqli_query($con, "SELECT * FROM category WHERE  categoryname Like '%$key%'");
// }
if (isset($_POST['submit'])) {
    $s = $_POST['n'];
    $sql = mysqli_query($con, "SELECT warehouse.name as n ,sell.price as price, sell.time_date as b,  sell.quantity_sell as qu ,category.categoryname as j ,sell.sell_id as id FROM warehouse   
    JOIN category  ON warehouse.category_id=category.category_id 
    join sell on sell.warehouse = warehouse.id  
    WHERE warehouse.name LIKE '%$s%' OR category.categoryname LIKE '%$s%'OR  sell.quantity_sell LIKE '%$s%'OR  sell.time_date LIKE '%$s%' and  warehouse.user=$user_id");
}
$warehouse = mysqli_query($con, "SELECT name from warehouse where user=$user_id");
$query = mysqli_query($con, "SELECT  warehouse.name as name,sell.time_date as date,  sell.quantity_sell as qua,sell.sell_id as id,category.categoryname as caname ,sell.price as price FROM warehouse JOIN category  ON warehouse.category_id=category.category_id join sell on sell.warehouse = warehouse.id     WHERE    warehouse.user=$user_id");
$businessname = mysqli_query($con, "SELECT  businessname  FROM user  where id='$user_id'");
while ($row = mysqli_fetch_assoc($businessname)) {
    $bname = $row['businessname'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,600;1,200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../pr/js/index.js"></script>
    <script src="../pr/js/translate.js"></script>
    <link href="../pr/css/css.css" rel="stylesheet" />
    <title>Project neme|History Expense </title>
</head>

<body id="text" onload="translate('en','lang-tag')">
    <section>
        <div class=" navbar navbar-expand-sm navbar-light bg-lightPink shadow ">
            <div class="container p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span><img src="logo/logo.png" alt="" width="25"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbar">
                    <ul class="navbar-nav mt-2 mt-lg-0 " id="navigation">
                        <li class="navbar-brand" value=" 1">
                            <img class="img-fluid" src="logo/logo.png" alt="" width="25">
                        </li>
                        <li class="nav-item " value=" 2">
                            <a class="nav-link" href=" ../pr/dashboard.php" lang-tag="dashboared"></a>
                        </li>
                        <li class="nav-item " value="3">
                            <a class="nav-link" href="../pr/add-catagory.php" lang-tag="addCategory"></a>
                        </li>
                        <li class="nav-item " value="4">
                            <a class="nav-link" href="../pr/history.php" lang-tag="expenseHistory"></a>
                        </li>
                        <li class="nav-item " value="5">
                            <a class="nav-link" href="../pr/werehouse.php" lang-tag="werehouse"></a>
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
                                <li><a class="dropdown-item" href="../pr/profile.php" lang-tag="profile"></a></li>
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
        <div class="container mx-auto my-4 pt-2 text-center">
            <h4 class="h4 text-darkBlue">Expense history</h4>
            <br>
            <div class="container ">
                <div class="container mx-auto w-50">
                    <form action="insert.php" method="POST" class="form-control">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="entername" aria-label="Floating label select example">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($warehouse)) {
                                            echo ' <option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                        } ?>
                                    </select>
                                    <label for="floatingSelect" lang-tag="entername">/label>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-floating mb-3 ">
                                    <input type="number" class="form-control" id="floatingInput" min="1" name="enterQuantity" placeholder="lang-tag=' entercost'">
                                    <label for="floatingInput" lang-tag="enterQuantity"></label>
                                </div>
                            </div>
                        </div>
                        <div class="w-50 mx-auto">
                            <div class="form-floating ">
                                <input type="number" class="form-control" id="floatingInput" min="1" name="warehousecost" placeholder="lang-tag=' entercost'">
                                <label for="floatingInput" lang-tag="cost"></label>
                            </div>
                        </div>
                        <button class="btn btn-lightPurple mt-2" lang-tag="save"></button>
                    </form>
                </div>
                <div class="container">
                    <div class="container p-3">
                        <!-- search -->
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="input-group p-3">
                                <input value="" type="text" name="n" class="form-control">
                                <button class="btn btn-lightPurple" type="submit" value="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                    <table class="table text-darkBlue table-sm" id="werehouseTable">
                        <thead>
                            <tr>
                                <th lang-tag="product"></th>
                                <th lang-tag="date"></th>
                                <th lang-tag="quantity"></th>
                                <th lang-tag="price"></th>
                                <th lang-tag="category"></th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($sql)) {
                            while ($r = mysqli_fetch_array($sql)) {
                                echo '<tr>';
                                echo '<td>' . $r['n'] . '</td>';
                                echo '<td>' . $r['b'] . '</td>';
                                echo '<td>' . $r['qu'] . '</td>';
                                echo '<td>' . $r['price'] . '</td>';
                                echo '<td>' . $r['j'] . '</td>';
                                $fff = $r['id'];
                                echo '<form><td class="text-center">
                            <a href="edithistory.php?edit=' . $r['id'] . '" class="btn btn-lightPurple btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                    </td>';
                                echo '<td class="text-center"> 
                            <a href="edithistory.php?del=' . $r['id'] . '" class="btn btn-lightPurple btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                    </td></form> 
                    </tr>';
                            }
                        } else {
                            while ($m = mysqli_fetch_assoc($query)) {
                                echo '<tr>';
                                echo '<td>' . $m['name'] . '</td>';
                                echo '<td>' . $m['date'] . '</td>';
                                echo '<td>' . $m['qua'] . '</td>';
                                echo '<td>' . $m['price'] . '</td>';
                                echo '<td>' . $m['caname'] . '</td>';
                                $fff = $m['id'];
                                echo '<td class="text-center">
                                <a href="edithistory.php?edit=' . $m['id'] . '" class="btn btn-lightPurple btn-sm"  ><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>';
                                echo '<td class="text-center">
                            <a href="edithistory.php?del=' . $m['id'] . '" class="btn btn-lightPurple btn-sm"  ><i class="fa-solid fa-trash-can"></i></a>
                        </td> 
                        </tr>';
                            }
                        }
                        ?>
                    </table>

                </div>

            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>