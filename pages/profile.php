<?php include("session.php");
$businessname = mysqli_query($con, "SELECT  businessname  FROM user  where id='$user_id'");
// this gets the business name
while ($row = mysqli_fetch_assoc($businessname)) {
    $bname = $row['businessname'];
};
$exp_fetched = mysqli_query($con, "SELECT * FROM user   WHERE id = '$user_id'");

if (isset($_POST['save'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $bname = $_POST['b_name'];
    if (isset($_FILES['file'])) {
        mysqli_query($con, "UPDATE user  SET firstname = '$fname', lastname='$lname', businessname='$bname' WHERE id='$user_id'");
        $name = $_FILES['file']['name'];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        echo $target_file;
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
            // Insert record
            $query = "UPDATE user SET profile_path = '$name' WHERE id='$user_id'";
            mysqli_query($con, $query);
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
        }
        header('location: profile.php');
    } else {
        $sql = "UPDATE user  SET firstname = '$fname', lastname='$lname', businessname='$bname' WHERE id='$user_id'";
        if (mysqli_query($con, $sql)) {
            echo "Records were updated successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
        header('location: profile.php');
    }
}
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script src="../js/translate.js"></script>
    <link href="../css/css.css" rel="stylesheet" />
    <title>Profile</title>
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
        <div class="container text-center mt-5 mx-auto">
            <h4 class="h4 text-darkBlue"><?php echo $bname  ?></h4>
            <hr>
            <form class="form" method="post" enctype='multipart/form-data'>
                <!-- this form is to change the profile pic/Fname/Lname/business name-->
                <div class="row">
                    <div class="col-md-5">
                        <div class="photoChange mt-4 pt-4">
                            <figure class="text-start figure">
                                <img class=" img border border-1 rounded-circle avatar figure-img" onclick="document.getElementById('file-input').click()" src="<?php echo $userprofile; ?>" height="300" id="profilePhotoP" alt="Profile Picture">
                                <figcaption class="figure-caption text-center" lang-tag="tochangephoto"></figcaption>
                            </figure>
                            <div class="input-group ">
                                <input type="file" name='file' id="file-input" style="display: none;" class="form-control rounded-pill" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row mt-5 pt-5">
                            <div class="col">
                                <div class="form-group">
                                    <div class="col-md">
                                        <label for="first_name" lang-tag="firstName">
                                        </label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $firstname; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="col-md">
                                        <label for="last_name" lang-tag="lastName">
                                        </label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $lastname; ?>" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group   mx-auto">
                            <label for="email" lang-tag="email">
                            </label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $useremail; ?>" disabled>
                        </div>
                        <label for="last_name" lang-tag="bName">
                        </label>
                        <input type="text" class="form-control text-center" name="b_name" id="last_name" value="<?php echo $bname; ?>" placeholder="Last Name">

                        <div class="form-group">
                            <div class="col-md">
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg rounded-pill btn-lightPurple mt-3 px-5" name="save" type="submit" lang-tag="save"></button>
            </form>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/index.js"></script>
</body>

</html>