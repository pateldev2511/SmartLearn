<?php

include 'connection.php';
session_start();

if ($_SESSION['user'] != 'student') {

    $_SESSION['msg'] = 'Need To Login';
    header("Refresh:0; url=login.php");
    # code...
}
if (isset($_POST['edit_student']) and $_SESSION['user'] = 'student') {

    $id = $_REQUEST['s_id'];

    echo $id;

    $s_name = $_POST['s_name'];

    $s_email = $_POST['s_email'];

    $s_address = mysqli_real_escape_string($con, $_POST['s_address']);

    $s_pincode = $_POST['s_pincode'];

    $s_status = 'yes';

    $date = date('Y-m-d H:i:s');

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../student/docs/" . $filename;


    $check_email = "SELECT `s_email` FROM `student` WHERE `s_email`='" . $s_email . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    if ($matchFound == "yes") {

        if (move_uploaded_file($tempname, $folder)) {
            # code...

            $sql = "UPDATE `student` SET `s_name`='" . $s_name . "',`s_address`='" . $s_address . "',`s_pincode`='" . $s_pincode . "',`s_email`='" . $s_email . "',`s_document`='" . $filename . "' WHERE  `s_id`='" . $id . "'";

            mysqli_query($con, $sql);

            $sql = "SELECT `s_id`, `s_name`, `s_address`, `s_pincode`, `s_email`, `s_password`, `s_document` FROM `student` WHERE  `s_id`='" . $id . "'";


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

            $_SESSION['msg'] = "Account Edited Sucessfully.";
            header("Refresh:0; url=profile_view.php");
        } else {

            $_SESSION['msg'] = 'Sorry! Something Went Wrong please Try Again';
            header("Refresh:0; url=profile_view.php");
        }
    } else {
        $_SESSION['msg'] = "No account Found.";
        header("Refresh:0; url=logout.php");
    }
}
