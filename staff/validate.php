<?php
include 'connection.php';
session_start();
error_reporting(0);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $st_email = $_POST['st_email'];

    $password = md5($_POST['st_password']);

    $check_email = "SELECT `st_name`, `st_address`, `st_pincode`, `st_email`, `st_password`, `st_document`, `st_active`, `st_create` FROM `staff` WHERE `st_email`='" . $st_email . "' AND `st_password`='" . $password . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    if ($matchFound == "yes") {

        $sql = "SELECT `st_name`, `st_address`, `st_pincode`, `st_email`, `st_password` FROM `staff` WHERE `st_email`='" . $st_email . "' AND `st_password`='" . $password . "'";


        $qurey = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($qurey)) {

            $name = $row['st_name'];
            header("Refresh:0; url=home.php");
        }
    } else {
        $_SESSION['msg'] = "Incorrect Username or Password";
        header("Refresh:0; url=login.php");
    }
}
