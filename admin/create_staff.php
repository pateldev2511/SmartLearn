<?php include "connection.php";
error_reporting(0);
session_start();

if ($_SESSION['user'] != 'admin') {

    $_SESSION['msg'] = 'Need To Login';
    header("Refresh:0; url=dashbord.php");
    # code...
}
?>
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
        <div class="row">
            <div id="wrapper">
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav" style="margin-left:0;">
                        <li class="sidebar-brand">
                            <a href="#menu-toggle" id="menu-toggle" style="margin-top:10px;float:right;">
                                <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="home.php"><i class="fas fa-home" aria-hidden="true"> </i> <span style="margin-left:10px;">Home</span> </a>
                        </li>
                        <li>
                            <a href="student_data.php"><i class="fas fa-user-check" aria-hidden="true"> </i> <span style="margin-left:10px;">Verify Account</span> </a>
                        </li>
                        <li>
                            <a href="create_student.php"> <i class="fas fa-plus-square" aria-hidden="true"> </i> <span style="margin-left:10px;">Add Student</span> </a>
                        </li>
                        <li>
                            <a href="edit_student.php"> <i class="fas fa-user-edit" aria-hidden="true"> </i> <span style="margin-left:10px;">Edit Student</span> </a>
                        </li>
                        <li>
                            <a href="create_staff.php"> <i class="fas fa-plus-square" aria-hidden="true"> </i> <span style="margin-left:10px;">Add Teacher</span> </a>
                        </li>
                        <li>
                            <a href="edit_teacher_table.php"> <i class="fas fa-user-edit" aria-hidden="true"> </i> <span style="margin-left:10px;">Edit Teacher</span> </a>
                        </li>
                        <li>
                            <a href="feedback.php"> <i class="fas fa-bug" aria-hidden="true"> </i> <span style="margin-left:10px;">FeedBacks</span> </a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-info-circle " aria-hidden="true"> </i> <span style="margin-left:10px;">Logout </span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card bg-light my-5">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">ADD TEACHER</h4>
                <form id="myform" action="create_sf.php" method="POST" enctype="multipart/form-data">
                    <span class="m-2"><?php
                                        if (isset($_SESSION['msg'])) {

                                            echo '<span class="text-danger"> ' . $_SESSION['msg'] . ' </span>';
                                            unset($_SESSION['msg']);
                                        }
                                        ?></span>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="st_name" class="form-control" placeholder="Full name" type="text" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="st_email" class="form-control" placeholder="Email Address" type="email" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-mobile"></i> </span>
                        </div>
                        <input name="st_mobile" class="form-control" placeholder="Phone Number" type="number" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
                        </div>
                        <textarea class="form-control" name="st_address" id="address" placeholder="Enter Address" cols="40" rows="3"></textarea>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-map-marker"></i> </span>
                        </div>
                        <input name="st_pincode" class="form-control" placeholder="Pin Code" type="number" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="st_password" id="password" class="form-control" placeholder="Create password" minlength="8" maxlength="25" type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="st_repassword" id="repassword" class="form-control" placeholder="Repeat password" type="password">

                    </div> <!-- form-group// -->
                    <span id='message'></span>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class=" fas fa-image "></i></i></span>
                        </div>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" name="create_teacher" class="btn btn-primary btn-block"> Add Teacher </button>
                    </div> <!-- form-group// -->
                </form>
            </article>
        </div> <!-- card.// -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

</html>