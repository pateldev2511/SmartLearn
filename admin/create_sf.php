<?php


include 'connection.php';
session_start();

if ($_SESSION['user'] != 'admin') {

    $_SESSION['msg'] = 'Need To Login';
    header("Refresh:0; url=dashbord.php");
    # code...
}
if (isset($_POST['create_teacher'])) {

    $s_name = $_POST['st_name'];

    $s_email = $_POST['st_email'];

    $s_address = mysqli_real_escape_string($con, $_POST['st_address']);

    $s_mobile = $_POST['st_mobile'];

    $s_pincode = $_POST['st_pincode'];

    $s_password = md5($_POST['st_password']);

    $s_status = 'yes';

    $date = date('Y-m-d H:i:s');

    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES["image"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $_SESSION['msg'] = "Please Select Image File Only";
        header("Refresh:0; url=create_staff.php");
    } else {

        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../staff/docs/" . $filename;
    }


    $check_email = "SELECT `st_email` FROM `staff` WHERE `st_email`='" . $s_email . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    if ($matchFound == "yes") {
        $_SESSION['msg'] = "Phone number Already exist";
        header("Refresh:0; url=student_data.php");
    } else {

        if (move_uploaded_file($tempname, $folder)) {
            # code...
            $sql = "INSERT INTO `staff`(`st_name`, `st_email`, `st_password`, `st_mobile`, `st_address`, `st_pincode`, `st_document`, `st_create`) VALUES ('" . $s_name . "','" . $s_email . "','" . $s_password . "','" . $s_mobile . "','" . $s_address . "','" . $s_pincode . "','" . $filename . "','" . $date . "')";


            mysqli_query($con, $sql);

            $_SESSION['msg'] = "Account Created Sucessfully.";
            header("Refresh:0; url=create_staff.php");
        } else {

            $_SESSION['msg'] = 'Sorry! Something Went Wrong please Try Again';
            header("Refresh:0; url=create_staff.php");
        }
    }
}
