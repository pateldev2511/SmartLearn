<?php
include 'connection.php';
session_start();
error_reporting(0);


if ($_SERVER['REQUEST_METHOD'] === 'POST' and $_SESSION['user'] != 'student') {

    $s_email = $_POST['s_email'];

    $password = md5($_POST['s_password']);

    $val = 'yes';

    $check_email = "SELECT  `s_email`, `s_password` FROM `student` WHERE `s_email`='" . $s_email . "' AND `s_password`='" . $password . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    $check_status = "SELECT  `s_email`, `s_active` FROM `student` WHERE `s_email`='" . $s_email . "' AND `s_active`='" . $val . "'AND `s_active`='" . $val . "'";

    $check_s = mysqli_query($con, $check_status);

    $matchStatus = mysqli_fetch_row($check_s) > 0 ? 'yes' : 'no';


    if ($matchStatus == "no") {
        # code...
        $_SESSION['msg'] = "Please Verify your Account .Check your Registered Email.";
        header("Refresh:0; url=login.php");
    } else {


        if ($matchFound == "yes") {

            $sql = "SELECT `s_id`, `s_name`, `s_address`, `s_pincode`, `s_email`, `s_password`, `s_document` FROM `student` WHERE `s_email`='" . $s_email . "' AND `s_password`='" . $password . "'";


            $qurey = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_array($qurey)) {

                $name = $row['s_name'];
                $temp_id = $row['s_id'];
                $add = $row['s_address'];
                $email = $row['s_email'];
                $pincode = $row['s_pincode'];
                $doc = $row['s_document'];
            }
            $_SESSION['s_name'] = $name;
            $_SESSION['s_temp_id'] = $temp_id;
            $_SESSION['s_email'] = $email;
            $_SESSION['s_address'] = $add;
            $_SESSION['s_pincode'] = $pincode;
            $_SESSION['s_doc'] = $doc;
            $_SESSION['user'] = 'student';
        } else {

            $_SESSION['msg'] = "Incorrect Username or Password";
            header("Refresh:0; url=login.php");
        }
    }
} elseif ($_SESSION['user'] == 'student') {
    # code...

    $temp_id = $_SESSION['s_temp_id'];
    $name = $_SESSION['s_name'];
    $email = $_SESSION['s_email'];
    $add = $_SESSION['s_address'];
    $pincode = $_SESSION['s_pincode'];
    $_SESSION['user'] = 'student';
} else {
    $_SESSION['msg'] = "Please Login.";
    header("Refresh:0; url=login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>SmartLearn Home</title>

    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style/style.css">

    <style>
        @media (max-width: 768px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* display 3 */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-right.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(33.333%);
            }

            .carousel-inner .carousel-item-left.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-33.333%);
            }
        }

        .carousel-inner .carousel-item-right,
        .carousel-inner .carousel-item-left {
            transform: translateX(0);
        }
    </style>
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
                    <h6 class="card-subtitle mb-2 text-muted"> <?php echo 'Hello Mr. ' . $name . ' Welcome To SmartLearn'; ?></h6>
                    <hr>
                    <p class="card-text">“I'm selfish, impatient and a little insecure. I make mistakes, I am out of control and at times hard to handle. But if you can't handle me at my worst, then you sure as hell don't deserve me at my best.” <br> ― Marilyn Monroe
                    </p>

                </div>
            </div>
        </div>
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
            </div>
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>

            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">

                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            <img class="card-img-top" src="https://picsum.photos/seed/picsum/245/163" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's content.</p>
                                <a class="btn btn-primary">Button</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            <img class="card-img-top" src="https://picsum.photos/seed/picsum/245/163" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's content.</p>
                                <a class="btn btn-primary">Button</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            <img class="card-img-top" src="https://picsum.photos/seed/picsum/245/163" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's content.</p>
                                <a class="btn btn-primary">Button</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            <img class="card-img-top" src="https://picsum.photos/seed/picsum/245/163" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's content.</p>
                                <a class="btn btn-primary">Button</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">

                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            <img class="card-img-top" src="https://picsum.photos/seed/picsum/245/163" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's content.</p>
                                <a class="btn btn-primary">Button</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            <img class="card-img-top" src="https://picsum.photos/seed/picsum/245/163" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's content.</p>
                                <a class="btn btn-primary">Button</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            <img class="card-img-top" src="https://picsum.photos/seed/picsum/245/163" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's content.</p>
                                <a class="btn btn-primary">Button</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            <img class="card-img-top" src="https://picsum.photos/seed/picsum/245/163" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's content.</p>
                                <a class="btn btn-primary">Button</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Second slide-->



            </div>
            <!--/.Slides-->

            <div class="container text-center my-3">
                <h2 class="font-weight-light">Best Teacher of 2020</h2>
                <div class="row mx-auto my-auto">
                    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner w-100" role="listbox">
                            <div class="carousel-item active">
                                <div class="col-md-4">
                                    <div class="card card-body">
                                        <img class="img-fluid" src="https://picsum.photos/seed/picsum/245/163">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-4">
                                    <div class="card card-body">
                                        <img class="img-fluid" src="https://picsum.photos/seed/picsum/245/163">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-4">
                                    <div class="card card-body">
                                        <img class="img-fluid" src="https://picsum.photos/seed/picsum/245/163">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-4">
                                    <div class="card card-body">
                                        <img class="img-fluid" src="https://picsum.photos/seed/picsum/245/163">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-4">
                                    <div class="card card-body">
                                        <img class="img-fluid" src="https://picsum.photos/seed/picsum/245/163">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-4">
                                    <div class="card card-body">
                                        <img class="img-fluid" src="https://picsum.photos/seed/picsum/245/163">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <h5 class="mt-2">Advances one slide at a time</h5>
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

        <script>
            $('#recipeCarousel').carousel({
                interval: 10000
            })

            $('.carousel .carousel-item').each(function() {
                var minPerSlide = 3;
                var next = $(this).next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                for (var i = 0; i < minPerSlide; i++) {
                    next = next.next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }

                    next.children(':first-child').clone().appendTo($(this));
                }
            });
        </script>
</body>

</html>