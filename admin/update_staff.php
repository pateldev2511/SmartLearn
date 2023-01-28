<?php

include 'connection.php';
session_start();

if ($_SESSION['user'] != 'admin') {

    $_SESSION['msg'] = 'Need To Login';
    header("Refresh:0; url=dashbord.php");
    # code...
}
if (isset($_POST['edit_staff'])) {

    $id = $_REQUEST['st_id'];

    $s_name = $_POST['st_name'];

    $s_email = $_POST['st_email'];

    $s_address = mysqli_real_escape_string($con, $_POST['st_address']);

    $s_pincode = $_POST['st_pincode'];

    $s_mobile = $_POST['st_mobile'];

    $s_status = 'yes';

    $date = date('Y-m-d H:i:s');

    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES["image"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $_SESSION['msg'] = "Please Select Image File Only";
        header("Refresh:0; url=edit_staff.php");
    } else {

        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../staff/docs/" . $filename;
    }

    $check_email = "SELECT `st_email` FROM `staff` WHERE `st_email`='" . $s_email . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    if ($matchFound == "yes") {

        if (move_uploaded_file($tempname, $folder)) {
            # code...

            $sql = "UPDATE `staff` SET `st_name`='" . $s_name . "',`st_email`='" . $s_email . "',`st_mobile`='" . $s_mobile . "',`st_address`='" . $s_address . "',`st_pincode`='" . $s_pincode . "',`st_document`='" . $filename . "' WHERE  `st_id`='" . $id . "'";

            mysqli_query($con, $sql);

            $_SESSION['msg'] = "Account Edited Sucessfully.";
            header("Refresh:0; url=edit_teacher_table.php");
        } else {

            $_SESSION['msg'] = 'Sorry! Something Went Wrong please Try Again';
            header("Refresh:0; url=edit_teacher_table.php");
        }
    } else {
        $_SESSION['msg'] = "No account Found.";
        header("Refresh:0; url=edit_teacher_table.php");
    }
}
