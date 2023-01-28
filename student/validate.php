<?php
include 'connection.php';
session_start();
error_reporting(0);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $s_email = $_POST['s_email'];

    $password = md5($_POST['s_password']);

    $check_email = "SELECT `s_name`, `s_address`, `s_pincode`, `s_email`, `s_password`, `s_document`, `s_active`, `s_create`, `s_update` FROM `student` WHERE `s_email`='" . $s_email . "' AND `s_password`='" . $password . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    if ($matchFound == "yes") {

        $sql = "SELECT `s_name`, `s_address`, `s_pincode`, `s_email`, `s_password` FROM `student` WHERE `s_email`='" . $s_email . "' AND `s_password`='" . $password . "'";

        $id = 1;

        $qurey = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($qurey)) {

            $name = $row['s_name'];
        }
    } else {

        $_SESSION['msg'] = "Incorrect Username or Password";
        header("Refresh:0; url=login.php");
    }
}
