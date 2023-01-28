<?php
include 'connection.php';
session_start();
error_reporting(0);


if ($_SERVER['REQUEST_METHOD'] === 'POST' and $_SESSION['user'] != 'teacher') {

    $st_email = $_POST['st_email'];

    $password = md5($_POST['st_password']);
    $val = 'yes';

    $check_email = "SELECT `st_name`,`st_email`,`st_password`,`st_mobile`, `st_address`,  `st_pincode`,   `st_document`, `st_create` FROM `staff` WHERE `st_email`='" . $st_email . "' AND `st_password`='" . $password . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    $check_status = "SELECT  `st_email`, `st_active` FROM `staff` WHERE `st_email`='" . $st_email . "' AND `st_active`='" . $val . "'";

    $check_s = mysqli_query($con, $check_status);

    $matchStatus = mysqli_fetch_row($check_s) > 0 ? 'yes' : 'no';

    if ($matchStatus == "no") {
        # code...
        $_SESSION['msg'] = "Please Verify your Account .Check your Registered Email.";
        header("Refresh:0; url=login.php");
    } else {
        if ($matchFound == "yes") {

            $sql = "SELECT `st_id`, `st_name`,`st_email`,`st_password`,`st_mobile`, `st_address`,  `st_pincode`,   `st_document`, `st_create` FROM `staff` WHERE `st_email`='" . $st_email . "' AND `st_password`='" . $password . "'";

            $qurey = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_array($qurey)) {

                $name = $row['st_name'];
                $temp_id = $row['st_id'];
                $add = $row['st_address'];
                $email = $row['st_email'];
                $pincode = $row['st_pincode'];
                $doc = $row['st_document'];
                $mobile = $row['st_mobile'];
            }
            $_SESSION['name'] = $name;
            $_SESSION['st_name'] = $name;
            $_SESSION['st_temp_id'] = $temp_id;
            $_SESSION['st_email'] = $email;
            $_SESSION['st_address'] = $add;
            $_SESSION['st_pincode'] = $pincode;
            $_SESSION['st_doc'] = $doc;
            $_SESSION['st_mobile'] = $mobile;
            $_SESSION['user'] = 'teacher';
        } else {

            $_SESSION['msg'] = "Incorrect Username or Password";
            header("Refresh:0; url=login.php");
        }
    }
} elseif ($_SESSION['user'] == 'teacher') {
    # code...

    $temp_id = $_SESSION['st_temp_id'];
    $name = $_SESSION['st_name'];
    $email = $_SESSION['st_email'];
    $add = $_SESSION['st_address'];
    $pincode = $_SESSION['st_pincode'];
    $mobile = $_SESSION['st_moile'];
    $_SESSION['user'] = 'teacher';
} else {
    $_SESSION['msg'] = "Please Login.";
    header("Refresh:0; url=login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>SmartLearn</title>

    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style/style.css">
</head>

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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile_view.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="add_course.php" class="card-link btn btn-outline-success">Add Courses</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="card-link btn btn-outline-success">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container pt-5">

        <div class="container align-content-center my-5">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Home Page</h5><br>
                    <h6 class="card-subtitle mb-2 text-muted"> <?php echo 'Hello Mr. ' . $_SESSION['name'] . ' Welcome To SmartLearn'; ?></h6>
                    <hr>
                    <p class="card-text">“I'm selfish, impatient and a little insecure. I make mistakes, I am out of control and at times hard to handle. But if you can't handle me at my worst, then you sure as hell don't deserve me at my best.” <br> ― Marilyn Monroe
                    </p>

                </div>
            </div>
        </div>

        <!-- required bootstrap js -->
        <!-- add 'carousel-slider' snippet in css -->
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/1604584189_Wraith 1.jpg" alt="">
                    <div class="carousel-caption">
                        <h3>Title</h3>
                        <p>Caption</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/2794b585f834468939ce843cdde3cb55.jpg" alt="">
                    <div class="carousel-caption">
                        <h3>Title</h3>
                        <p>Caption</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/6a2523959209d902adc540345120f22d.jpg" alt="">
                    <div class="carousel-caption">
                        <h3>Title</h3>
                        <p>Caption</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <!-- required FontAwesome -->
        <!-- add 'timeline-r' snippet in css -->
        <ul class="timeline">
            <li>
                <div class="timeline-badge"><i class="fa fa-user"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">title</h4>
                    </div>
                    <div class="timeline-body">
                        <p>caption</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge"><i class="fa fa-home"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">title</h4>
                    </div>
                    <div class="timeline-body">
                        <p>caption</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge"><i class="fa fa-user"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">title</h4>
                    </div>
                    <div class="timeline-body">
                        <p>caption</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge"><i class="fa fa-home"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">title</h4>
                    </div>
                    <div class="timeline-body">
                        <p>caption</p>
                    </div>
                </div>
            </li>
        </ul>

        <!-- add 'flip-card' snippet in css -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="images/wallhaven-w8xwpx.jpg" alt="Avatar" style="width:200px;height:200px;">
                </div>
                <div class="flip-card-back">
                    <h1></h1>
                    <p></p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
</body>

</html>