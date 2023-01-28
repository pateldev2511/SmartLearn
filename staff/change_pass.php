<?php
include 'connection.php';
session_start();
error_reporting(0);


if ($_SERVER['REQUEST_METHOD'] === 'POST' and $_SESSION['user'] == 'teacher') {

    $id = $_SESSION['st_temp_id'];
    $c_pass = md5($_POST['st_current_password']);
    $n_pass = md5($_POST['st_new_password']);

    if ($c_pass != $n_pass) {

        $check_email = "SELECT `st_name`, `st_address`, `st_pincode`, `st_email`, `st_password` FROM `staff` WHERE `st_id`='" . $id . "' AND `st_password`='" . $c_pass . "'";

        $check = mysqli_query($con, $check_email);

        $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

        if ($matchFound == "yes") {

            $sql = "UPDATE `staff` SET `st_password`='" . $n_pass . "' WHERE  `st_id`='" . $id . "'";

            $qurey = mysqli_query($con, $sql);

            $_SESSION['msg'] = 'Password Changed Successfully !';
            header("Refresh:0; url=profile_view.php");
        } else {
            $_SESSION['msg'] = 'Entered Current Password was wrong!. Please try Again.';
            header("Refresh:0; url=change_password.php");
        }
    } else {
        $_SESSION['msg'] = 'New password can not be same as new password';
        header("Refresh:0; url=change_password.php");
    }
}
