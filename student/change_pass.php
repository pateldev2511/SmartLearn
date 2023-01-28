<?php
include 'connection.php';
session_start();
error_reporting(0);


if ($_SERVER['REQUEST_METHOD'] === 'POST' and $_SESSION['user'] == 'student') {

    $id = $_SESSION['s_temp_id'];
    $c_pass = md5($_POST['s_current_password']);
    $n_pass = md5($_POST['s_new_password']);

    if ($c_pass != $n_pass) {

        $check_email = "SELECT `s_name`, `s_address`, `s_pincode`, `s_email`, `s_password`, `s_document`, `s_active`, `s_create`, `s_update` FROM `student` WHERE `s_id`='" . $id . "' AND `s_password`='" . $c_pass . "'";

        $check = mysqli_query($con, $check_email);

        $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

        if ($matchFound == "yes") {

            $sql = "UPDATE `student` SET `s_password`='" . $n_pass . "' WHERE  `s_id`='" . $id . "'";

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
