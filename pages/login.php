<?php
// Require the validation file
require_once "validation.php" ?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/css.css" rel="stylesheet" />
    <title>Login</title>
</head>

<body id="loginn">
    <section>
        <div class="container p-5 my-5">
            <div class="row">
                <div class="col-sm-6">
                    <form method="POST">
                        <!--this form is validated in the validation.php-->
                        <h2 class="my-3 text-center">Login</h2>
                        <!--this php code is to display the error messages-->
                        <?php
                        if (isset($_SESSION['info'])) {
                        ?>
                            <div class="alert alert-success text-center">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                        <?php
                            unset($_SESSION['info']);
                        }
                        ?>
                        <?php
                        if (count($errors) > 0) {
                        ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach ($errors as $showerror) {
                                    echo $showerror;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="container my-5 text-center">
                            <div class="container">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" autocomplete="true">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" autocomplete="true">
                                    <label for="floatingPassword">Password</label>
                                </div>
                            </div>
                            <button type="submit" name="login" class="btn rounded-pill btn-orange px-5 my-3">Login</button><br>
                            <label><a class="text-success" href="forgot-password.php">Forget your password?</a></label><br>
                            <label class="text-center">Don't have an account? <a class="text-success" href="registration.php">Sign Up</a></label>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <p class="h1 d"> Hi!<br>Welcome Back</p>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>