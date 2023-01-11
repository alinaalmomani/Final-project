<?php
include("session.php");
$cost = mysqli_query($con, "SELECT warehouse.name as pname FROM sell   join warehouse on warehouse= id where user_id='$user_id' group by pname ORDER BY quantity_sell DESC  LIMIT 3  ");
$sell = mysqli_query($con, "SELECT SUM(warehouse.cost)as cost, SUM(price) as price FROM  sell join warehouse on warehouse.id=sell.warehouse WHERE user_id = '$user_id'");
$charts = mysqli_query($con, "SELECT sell.time_date as time_date FROM `sell` inner join warehouse on warehouse.id=sell.warehouse where sell.user_id='$user_id' group by year(sell.time_date),warehouse.name;");
$charts2 = mysqli_query($con, "SELECT warehouse.name as pname FROM `warehouse` inner join sell on warehouse.id=sell.warehouse where sell.user_id='$user_id' group by year(sell.time_date),pname;");
$charts3 = mysqli_query($con, "SELECT sum(sell.quantity_sell) as Q   FROM sell  join warehouse on warehouse= id where user_id='$user_id' group by warehouse.name");
$charts4 = mysqli_query($con, "SELECT  warehouse.name as pname  FROM sell  join warehouse on warehouse= id where user_id='$user_id' group by warehouse.name ");
$businessname = mysqli_query($con, "SELECT  businessname  FROM user  where id='$user_id'");
while ($row = mysqli_fetch_assoc($businessname)) {
    $bname = $row['businessname'];
};

while ($row = mysqli_fetch_assoc($sell)) {
    $cost_price = $row['cost'];
    $price = $row['price'];
    $revenue = (float)$price - (float)$cost_price;
};
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script src="../pr/js/translate.js"></script>
    <link href="../pr/css/css.css" rel="stylesheet" />
    <title>ProjectName| dashboard</title>
</head>

<body id="text" onload="translate('en','lang-tag');">
    <section>
        <div class=" navbar navbar-expand-sm navbar-light bg-lightPink shadow ">
            <div class="container p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
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
                                    <p lang-tag="changeTheme">Change theme</p>
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
        <div class="container">
            <div class="row py-5">

                <div class="container  my-2 col-8 ">
                    <h5 lang-tag="mostSold" class="text-center text-darkBlue"></h5>
                    <div class="d-flex justify-content-center text-center ">
                        <?php $count = 1;
                        while ($row = mysqli_fetch_assoc($cost)) {
                            if ($count) { ?>
                                <div class="col-sm-4">
                                    <label class="rounded-pill border border-1 mx-5  p-1 px-5">
                                        <?php echo $count . ". " . $row['pname']; ?>
                                    </label>
                                </div>
                        <?php }
                            $count++;
                        } ?>
                    </div>
                </div>
                <div class="container text-center  my-2 col-4">
                    <h5 class="text-darkBlue h5" lang-tag="revenue"></h5>
                    <label class="rounded-pill border border-1 mx-5 p-1 px-5" id="income">
                        <?php echo $revenue; ?>
                    </label>
                </div>
            </div>
            <div class="container text-center mt-1 p-5">
                <h2 class="text-darkBlue h2" lang-tag="sellCharts"></h2>
                <div class="chart d-flex ">
                    <div class="liner col-md-6">
                        <h4 class="text-lightBlue h4" lang-tag="yearly"></h4>
                        <div class="container">
                            <canvas id="myChart">
                            </canvas>
                        </div>
                    </div>
                    <div class="line col-md-6">
                        <h4 class="text-lightBlue h4" lang-tag="quantity"></h4>
                        <div class="container">
                            <canvas id="myChart2">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script src="../pr/js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php
                            while ($row = mysqli_fetch_assoc($charts2)) {
                                echo '"' . $row['pname'] . '",';
                            }; ?>],
                datasets: [{
                    label: 'YEARLY',
                    data: [<?php
                            while ($row = mysqli_fetch_assoc($charts)) {
                                echo '"' . explode("-", $row['time_date'])[0] . '",';
                            }; ?>],
                    backgroundColor: [
                        '#FA6856', '#EC6967', '#F93960', '#F28B2B', '#F8A650', '#EA3772', '#E9892A'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        type: "time",
                        time: {
                            unit: 'year',
                            tooltipFormat: 'yyyy'
                        },
                        min: '2019',
                    },
                    x: {
                        title: {
                            color: '#5A5A5A',
                            display: true,
                            text: 'Products'
                        }
                    }
                }
            }
        });
        const ct = document.getElementById('myChart2');
        new Chart(ct, {
            type: 'line',
            data: {
                labels: [<?php
                            while ($row = mysqli_fetch_assoc($charts4)) {
                                echo '"' . $row['pname'] . '",';
                            }; ?>

                ],
                datasets: [{
                    label: 'sold',
                    data: [
                        <?php
                        while ($row = mysqli_fetch_assoc($charts3)) {
                            echo '"' . $row['Q'] . '",';
                        }; ?>
                    ],
                    backgroundColor: [
                        '#FA6856', '#EC6967', '#F93960', '#F28B2B', '#F8A650', '#EA3772', '#E9892A'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        title: {
                            color: '#5A5A5A',
                            display: true,
                            text: 'Products'
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>