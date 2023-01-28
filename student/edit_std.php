<?php include "connection.php";
error_reporting(0);
session_start();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="icon" href="images/logo.png" type="image/x-icon">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="style/style.css">


<body style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">


    <?php
    if ($_SESSION['user'] == 'student') {
        # code...
        $id = $_SESSION['s_temp_id'];

        $sql = "SELECT * FROM `student` WHERE `s_id`='$id'";
        $qurey = mysqli_query($con, $sql);

        $name;
        $email;
        $add;
        $pincode;
        $doc;

        while ($row = mysqli_fetch_array($qurey)) {

            $name = $row["s_name"];

            $email = $row["s_email"];

            $add = $row["s_address"];

            $pincode = $row["s_pincode"];

            $doc = $row["s_document"];
        }
    } else {
        $_SESSION['msg'] = 'Need To Login.';
        header("Refresh:0; url=login.php");
    }

    ?>

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
                <h4 class="card-title mt-3 text-center">Edit Student Account</h4>
                <form id="myform" action="update_student.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="s_id" value="<?php echo $id; ?>">
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
                        <input name="s_name" class="form-control" placeholder="Full name" type="text" value="<?php echo $name; ?>" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="s_email" class="form-control" placeholder="Email Address" type="email" value="<?php echo $email; ?>" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
                        </div>
                        <textarea class="form-control" name="s_address" id="address" placeholder="Enter Address" cols="40" rows="3"><?php echo $add; ?></textarea>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-map-marker"></i> </span>
                        </div>
                        <input name="s_pincode" class="form-control" placeholder="Pin Code" type="number" value="<?php echo $pincode; ?>" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><?php echo "<img src='../student/docs/" . $doc . "' width='300' height='250'>"; ?></span>
                        </div>
                    </div>

                    <div class="form-group input-group">
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" name="edit_student" class="btn btn-primary btn-block"> Edit Student Account </button>
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
</body>