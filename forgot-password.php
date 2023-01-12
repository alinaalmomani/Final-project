<?php require_once "validation.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="icon" type="image/x-icon" href="logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,600;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../pr/css/css.css" rel="stylesheet" />

</head>

<body id="login">
    <section>
        <div class="container p-5 my-5">
            <div class="row">
                <div class="col-md-4 offset-md-4 form ">
                    <form action="forgot-password.php" method="POST" autocomplete="">
                        <h2 class="text-center">Forgot Password</h2>
                        <p class="text-center">Enter your email address</p>
                        <?php
                        if (count($errors) > 0) {
                        ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach ($errors as $error) {
                                    echo $error;
                                }
                                ?>
                            </div>
                        <?php
                            unset($errors);
                        }
                        ?>
                        <div class="form-group mb-3">
                            <input class="form-control" type="email" name="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="check-email" value="Continue">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../pr/js/login.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

</html>