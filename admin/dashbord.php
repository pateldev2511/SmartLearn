<?php include "connection.php";
error_reporting(0);
session_start(); ?>
<!doctype html>
<html lang="en">


<head>
    <title>Admin Dashbord</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <!-- required fontawesome -->
    <!-- add 'sidebar-icons' snippet in css -->
    <!-- add 'sidebar-icons' snippet in js -->
    <div class="container">

        <div class="container">
            <br>
            <p class="text-center h3">Welcome Admin. How are you?</p>


            <div class="card bg-light">
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <h4 class="card-title mt-3 text-center">Admin LogIn</h4>
                    <form action="validate.php" method="POST">
                        <span class="m-2"><?php
                                            if (isset($_SESSION['msg'])) {

                                                echo '<span class="text-danger"> ' . $_SESSION['msg'] . ' </span>';
                                                unset($_SESSION['msg']);
                                            }
                                            ?></span>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="a_email" class="form-control" placeholder="Email address" type="email" required>
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="a_password" class="form-control" placeholder="Enter password" type="password" require>
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Admin LogIn </button>
                        </div> <!-- form-group// -->
                    </form>
                </article>
            </div> <!-- card.// -->

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
</body>

</html>