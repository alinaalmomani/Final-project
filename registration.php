<?php require_once "validation.php";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../pr/css/css.css" rel="stylesheet" />
    <title>Registration</title>
</head>

<body>
    <section>
        <div class="container mx-auto p-4 w-50 my-4">
            <form method="post" action="registration.php">
                <h2 class="my-3 text-center"> Sign Up</h2>
                <?php
                if (count($errors) == 1) {
                ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach ($errors as $showerror) {
                            echo $showerror;
                        }
                        ?>
                    </div>
                <?php
                } elseif (count($errors) > 1) {
                ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach ($errors as $showerror) {
                        ?>
                            <li><?php echo $showerror; ?></li>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                <div class="container  text-center">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-3 ">
                                <input type="text" class="form-control" id="floatingInput" name="firstname" placeholder="First Name" required="required">
                                <label for="floatingInput">First Name</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3 ">
                                <input type="text" class="form-control" id="floatingInput2" name="lastname" placeholder="Last Name" required="required">
                                <label for="floatingInput2">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput3" name="bname" placeholder="Buisness Name" required="required">
                        <label for="floatingInput3">Business Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput4" name="email" placeholder="name@example.com" required="required">
                        <label for="floatingInput4">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required="required">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword1" name="confirm_password" placeholder="Confirm Password" required="required">
                        <label for="floatingPassword1">Confirm Password</label>
                    </div>
                    <div class="text-center pt-2">
                        <label class="form-check-label text-start"><input type="checkbox" required="required"> I
                            accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label><br>
                    </div>
                    <button type="submit" name="signup" class="btn rounded-pill btn-orange btn-lg my-2 px-5">Sign Up</button><br>
                    <label class="text-center">Already have an account? <a class="text-success" href="login.php">Login
                            Here</a></label>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../pr/js/login.js "> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>