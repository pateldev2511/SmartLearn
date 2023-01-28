<?php
include 'connection.php';
session_start();
error_reporting(0);

if ($_SESSION['user'] != 'teacher') {
    # code...

    $_SESSION['msg'] = "Please Login.";
    header("Refresh:0; url=login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
</head>

<style>
    body {
        font-size: 16px;
        color: #6f6f6f;
        font-weight: 400;
        line-height: 28px;
        letter-spacing: 0.8px;
        margin-top: 20px;
    }

    .font-size38 {
        font-size: 38px;
    }

    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 36px
    }

    .team-single-text .section-heading.half {
        margin-bottom: 20px
    }

    @media screen and (max-width: 1199px) {

        .team-single-text .section-heading h4,
        .section-heading h5 {
            font-size: 32px
        }

        .team-single-text .section-heading.half {
            margin-bottom: 15px
        }
    }

    @media screen and (max-width: 991px) {

        .team-single-text .section-heading h4,
        .section-heading h5 {
            font-size: 28px
        }

        .team-single-text .section-heading.half {
            margin-bottom: 10px
        }
    }

    @media screen and (max-width: 767px) {

        .team-single-text .section-heading h4,
        .section-heading h5 {
            font-size: 24px
        }
    }


    .team-single-icons ul li {
        display: inline-block;
        border: 1px solid #02c2c7;
        border-radius: 50%;
        color: #86bc42;
        margin-right: 8px;
        margin-bottom: 5px;
        -webkit-transition-duration: .3s;
        transition-duration: .3s
    }

    .team-single-icons ul li a {
        color: #02c2c7;
        display: block;
        font-size: 14px;
        height: 25px;
        line-height: 26px;
        text-align: center;
        width: 25px
    }

    .team-single-icons ul li:hover {
        background: #02c2c7;
        border-color: #02c2c7
    }

    .team-single-icons ul li:hover a {
        color: #fff
    }

    .team-social-icon li {
        display: inline-block;
        margin-right: 5px
    }

    .team-social-icon li:last-child {
        margin-right: 0
    }

    .team-social-icon i {
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        font-size: 15px;
        border-radius: 50px
    }

    .padding-30px-all {
        padding: 30px;
    }

    .bg-light-gray {
        background-color: #f7f7f7;
    }

    .text-center {
        text-align: center !important;
    }

    img {
        max-width: 100%;
        height: auto;
    }


    .list-style9 {
        list-style: none;
        padding: 0
    }

    .list-style9 li {
        position: relative;
        padding: 0 0 15px 0;
        margin: 0 0 15px 0;
        border-bottom: 1px dashed rgba(0, 0, 0, 0.1)
    }

    .list-style9 li:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0
    }


    .text-sky {
        color: #02c2c7
    }

    .text-orange {
        color: #e95601
    }

    .text-green {
        color: #5bbd2a
    }

    .text-yellow {
        color: #f0d001
    }

    .text-pink {
        color: #ff48a4
    }

    .text-purple {
        color: #9d60ff
    }

    .text-lightred {
        color: #ff5722
    }

    a.text-sky:hover {
        opacity: 0.8;
        color: #02c2c7
    }

    a.text-orange:hover {
        opacity: 0.8;
        color: #e95601
    }

    a.text-green:hover {
        opacity: 0.8;
        color: #5bbd2a
    }

    a.text-yellow:hover {
        opacity: 0.8;
        color: #f0d001
    }

    a.text-pink:hover {
        opacity: 0.8;
        color: #ff48a4
    }

    a.text-purple:hover {
        opacity: 0.8;
        color: #9d60ff
    }

    a.text-lightred:hover {
        opacity: 0.8;
        color: #ff5722
    }

    .custom-progress {
        height: 10px;
        border-radius: 50px;
        box-shadow: none;
        margin-bottom: 25px;
    }

    .progress {
        display: -ms-flexbox;
        display: flex;
        height: 1rem;
        overflow: hidden;
        font-size: .75rem;
        background-color: #e9ecef;
        border-radius: .25rem;
    }


    .bg-sky {
        background-color: #02c2c7
    }

    .bg-orange {
        background-color: #e95601
    }

    .bg-green {
        background-color: #5bbd2a
    }

    .bg-yellow {
        background-color: #f0d001
    }

    .bg-pink {
        background-color: #ff48a4
    }

    .bg-purple {
        background-color: #9d60ff
    }

    .bg-lightred {
        background-color: #ff5722
    }
</style>

<body>

    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Teacher</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
        <div class="team-single">
            <div class="row">
                <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                    <div class="team-single-img">
                        <?php echo "<img src='docs/" . $_SESSION['st_doc'] . "' alt='Student' class='rounded mx-auto d-block' width='315' height='315'>" ?>
                    </div>
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                        <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600"><?php echo $_SESSION['s_name']; ?></h4>
                        <p class="sm-width-95 sm-margin-auto">We are proud of child student. We teaching great activities and best program for your kids.</p>
                        <div class="margin-20px-top team-single-icons">
                            <a href="edit_staff.php" class="btn btn-success">Edit Profile</a>
                            <a href="change_password.php" class="btn btn-outline-primary">Change Password</a>
                            <ul class="no-margin my-3">
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="team-single-text padding-50px-left sm-no-padding-left">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30"><?php echo $_SESSION['st_name']; ?></h4>
                        <p class="no-margin-bottom">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum voluptatem.</p>
                        <div class="contact-info-section margin-40px-tb">
                            <ul class="list-style9 no-margin">
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-user-alt text-orange"></i>
                                            <strong class="margin-10px-left text-orange">Name:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?php echo $_SESSION['st_name']; ?></p>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-envelope text-pink"></i>
                                            <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><a href="javascript:void(0)"><?php echo $_SESSION['st_email']; ?></a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-mobile-alt text-purple"></i>
                                            <strong class="margin-10px-left xs-margin-four-left text-purple">Phone:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?php echo $_SESSION['st_mobile']; ?></p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-map-marker-alt text-green"></i>
                                            <strong class="margin-10px-left text-green">Address:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?php echo $_SESSION['st_address']; ?>.</p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="far fa-gem text-yellow"></i>
                                            <strong class="margin-10px-left text-yellow">Exp.:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>4 Year in Education</p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="far fa-file text-lightred"></i>
                                            <strong class="margin-10px-left text-lightred">Courses:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>Design Category</p>
                                        </div>
                                    </div>

                                </li>


                            </ul>
                        </div>

                        <h5 class="font-size24 sm-font-size22 xs-font-size20">Professional Skills</h5>

                        <div class="sm-no-margin">
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-7">Positive Behaviors</div>
                                    <div class="col-5 text-right">40%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress">
                                <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:40%" class="animated custom-bar progress-bar slideInLeft bg-sky"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-7">Teamworking Abilities</div>
                                    <div class="col-5 text-right">50%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress">
                                <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:50%" class="animated custom-bar progress-bar slideInLeft bg-orange"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-7">Time Management </div>
                                    <div class="col-5 text-right">60%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress">
                                <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:60%" class="animated custom-bar progress-bar slideInLeft bg-green"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-7">Excellent Communication</div>
                                    <div class="col-5 text-right">80%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress">
                                <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%" class="animated custom-bar progress-bar slideInLeft bg-yellow"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>