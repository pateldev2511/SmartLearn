<?php
include 'connection.php';
error_reporting(0);
session_start();

if ($_SESSION['user'] == 'teacher') {
    # code...

    $_SESSION['msg'] = "Please Login.";
    header("Refresh:0; url=home.php");
} else {
    if (isset($_GET['token'])) {
        # code...
        $token = $_GET['token'];

        $sql = "SELECT * FROM `staff` WHERE `st_token`='$token'";
        $qurey = mysqli_query($con, $sql);
        $rowcount = mysqli_num_rows($qurey);

        if ($rowcount == 1) {
            # code...
            $sql = "SELECT * FROM `staff` WHERE `st_token`='$token' AND `st_active`= 'no'";
            $qurey = mysqli_query($con, $sql);
            $rowcount = mysqli_num_rows($qurey);
            if ($rowcount == 1) {
                # code...
                $isUpdated = 0;
                try {
                    //code...
                    $sql = "UPDATE `staff` SET `st_active`='yes', `st_token`='' WHERE `st_token`='$token' AND `st_active`= 'no'";
                    mysqli_query($con, $sql);
                    $isUpdated = 1;
                } catch (\Throwable $th) {
                    //throw $th;
                }

                if ($isUpdated == 1) {
                    # code...
                    $_SESSION['msg'] = "Acount is  Actived Successfully.";
                    header("Refresh:0; url=login.php");
                } else {
                    $_SESSION['msg'] = "unable to Activate Your Account Please try Again";
                    header("Refresh:0; url=student_verify.php");
                }
            } else {
                $_SESSION['msg'] = "Acount is Already Active.";
                header("Refresh:0; url=login.php");
            }
        } else {
            $_SESSION['msg'] = "Invalid Verification Token.";
            header("Refresh:0; url=registration.php");
        }
    }
}
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="icon" href="images/logo.png" type="image/x-icon">
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<title>LogIn</title>

<body>
    <!-- required bootstrap js -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png
                " alt="" , height="34">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-muted h4" href="#">Smart Learn</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">AboutUs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ContactUS</a>
                    </li>
                    <li class="nav-item">
                        <a href="registration.php" class="card-link btn btn-outline-success">Create Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <br>
        <p class="text-center h3">Welcome to Smart Learn. Happy Learning.</p>


        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <form action="home.php" method="POST">
                    <span class="m-2"><?php
                                        if (isset($_SESSION['msg'])) {

                                            echo '<span class="text-danger"> ' . $_SESSION['msg'] . ' </span>';
                                            unset($_SESSION['msg']);
                                        }
                                        ?></span>
                </form>
            </article>
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->
    <!-- add 'footer' snippet in css -->
    <div class="footer-v1 bg-img">
        <div class="footer no-margin">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="headline">
                            <p>Exams</p>
                        </div>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">Exam1</a></li>
                            <li><a href="#">Exam2</a></li>
                            <li><a href="#">Exam3/a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="headline">
                            <p>Resources</p>
                        </div>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="headline">
                            <p>Support</p>
                        </div>
                        <address>
                            <ul class="list-unstyled link-list">
                                <li><a href="#">Contact Us</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-envelope"></i>support@company.com</a>
                                </li>
                            </ul>
                        </address>
                    </div>
                    <div class="col-md-3">
                        <div class="headline">
                            <p>Company</p>
                        </div>
                        <ul class="list-unstyled link-list">
                            <li><a href="aboutus.html">About Us</a></li>
                            <li> <a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Cancellation/Rescheduling policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
</body>