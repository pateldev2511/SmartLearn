<?php
include 'connection.php';
session_start();
error_reporting(0);


if ($_SESSION['user'] != 'admin' and isset($_POST['a_email'])) {

    $a_email = $_POST['a_email'];

    $password = md5($_POST['a_password']);

    $check_email = "SELECT `a_username`, `a_password` FROM `admin` WHERE `a_username`='" . $a_email . "' AND `a_password`='" . $password . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    if ($matchFound == "yes") {

        $sql = "SELECT `a_username`, `s_password` FROM `student` WHERE `a_username`='" . $a_email . "' AND `a_password`='" . $password . "'";


        $qurey = mysqli_query($con, $sql);

        $_SESSION['user'] = 'admin';
        header("Refresh:0; url=home.php");
    } else {

        $_SESSION['msg'] = "Incorrect Username or Password";
        header("Refresh:0; url=dashbord.php");
    }
}
