<?php include "connection.php";
error_reporting(0); ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="icon" href="images/logo.png" type="image/x-icon">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="style/style.css">


<body style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">


    <?php

    $id = $_GET['id'];

    $sql = "SELECT * FROM `staff` WHERE `st_id`='$id'";
    $qurey = mysqli_query($con, $sql);

    $name;
    $email;
    $add;
    $pincode;
    $mobile;
    $doc;

    while ($row = mysqli_fetch_array($qurey)) {

        $name = $row["st_name"];

        $email = $row["st_email"];

        $add = $row["st_address"];

        $pincode = $row["st_pincode"];

        $mobile = $row["st_mobile"];

        $doc = $row["st_document"];
    }
    ?>

    <div class="container">
        <br>

        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Edit Teacher</h4>
                <form id="myform" action="update_staff.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="st_id" value="<?php echo $id; ?>">
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
                        <input name="st_name" class="form-control" placeholder="Full name" type="text" value="<?php echo $name; ?>" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="st_email" class="form-control" placeholder="Email Address" type="email" value="<?php echo $email; ?>" disabled required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="st_mobile" class="form-control" placeholder="Mobile" type="number" value="<?php echo $mobile; ?>" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
                        </div>
                        <textarea class="form-control" name="st_address" id="address" placeholder="Enter Address" cols="40" rows="3"><?php echo $add; ?></textarea>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-map-marker"></i> </span>
                        </div>
                        <input name="st_pincode" class="form-control" placeholder="Pin Code" type="number" value="<?php echo $pincode; ?>" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><?php echo "<img src='../staff/docs/" . $doc . "' width='300' height='250'>"; ?></span>
                        </div>
                    </div>

                    <div class="form-group input-group">
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" name="edit_staff" class="btn btn-primary btn-block"> Edit Teacher Account </button>
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