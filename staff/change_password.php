<?php
include 'connection.php';
session_start();
if ($_SESSION['user'] != 'teacher') {
    # code...

    $_SESSION['msg'] = "Please Login.";
    header("Refresh:0; url=login.php");
}



?>
<title>Register</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="icon" href="images/logo.png" type="image/x-icon">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="style/style.css">

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
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile_view.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="card-link btn btn-outline-success">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <br>


        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Change Password</h4>
                <form id="myform" action="change_pass.php" method="POST" enctype="multipart/form-data">
                    <span class="m-2"><?php
                                        if (isset($_SESSION['msg'])) {

                                            echo '<ul class="list-group"><li class="list-group-item list-group-item-warning"><span class="text-danger"> ' . $_SESSION['msg'] . ' </span></li></ul>';
                                            unset($_SESSION['msg']);
                                        }
                                        ?></span>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="st_current_password" id="current_password" class="form-control" placeholder="Current password" minlength="8" maxlength="25" type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="st_new_password" id="password" class="form-control" placeholder="New password" minlength="8" maxlength="25" type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="st_repassword" id="repassword" class="form-control" placeholder="Repeat New password" type="password">

                    </div> <!-- form-group// -->
                    <span id='message'></span>

                    <div class="form-group">
                        <button type="submit" id="submit" name="change_password" class="btn btn-primary btn-block" disabled='true'> Create Password </button>
                    </div> <!-- form-group// -->
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
                            <li><a href="#">Exam3</a></li>
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




    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
    </script>
    <script src='https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js'></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="scripts/script.js"></script>

    <script>
        $('form').validate();

        $('#password, #repassword').on('keyup', function() {
            if ($('#password').val() == $('#repassword').val()) {
                $('#submit').prop('disabled', false);
                $('#message').html('Matching').css('color', 'green');

            } else
                $('#message').html('Not Matching').css('color', 'red');
        });
    </script>
</body>