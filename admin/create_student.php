<?php
include 'connection.php';
session_start();

if ($_SESSION['user'] != 'admin') {

    $_SESSION['msg'] = 'Need To Login';
    header("Refresh:0; url=dashbord.php");
    # code...
}
?>
<title>Student Register</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="icon" href="images/logo.png" type="image/x-icon">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="style/style.css">

<body>

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
                <h4 class="card-title mt-3 text-center">Create Account</h4>
                <form id="myform" action="create.php" method="POST" enctype="multipart/form-data">
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
                        <input name="s_name" class="form-control" placeholder="Full name" type="text" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="s_email" class="form-control" placeholder="Email Address" type="email" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
                        </div>
                        <textarea class="form-control" name="s_address" id="address" placeholder="Enter Address" cols="40" rows="3"></textarea>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-map-marker"></i> </span>
                        </div>
                        <input name="s_pincode" class="form-control" placeholder="Pin Code" type="number" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="s_password" id="password" class="form-control" placeholder="Create password" minlength="8" maxlength="25" type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="s_repassword" id="repassword" class="form-control" placeholder="Repeat password" type="password">

                    </div> <!-- form-group// -->
                    <span id='message'></span>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class=" fas fa-image "></i></i></span>
                        </div>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" name="create" class="btn btn-primary btn-block" disabled='true'> Create Account </button>
                    </div> <!-- form-group// -->

                </form>
            </article>
        </div> <!-- card.// -->


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