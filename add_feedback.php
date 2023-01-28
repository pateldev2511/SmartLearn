<?php
include 'student/connection.php';

error_reporting(0);
session_start();


if (isset($_POST['feedback'])) {

    $fd_name = $_POST['name'];

    $fd_email = $_POST['email'];

    $fd_decs = mysqli_real_escape_string($con, $_POST['message']);

    $date = date('Y-m-d H:i:s');


    try {
        $sql = "INSERT INTO `feedback`(`fd_name`, `fd_email`, `fd_desc`) VALUES ('" . $fd_name . "','" . $fd_email . "','" . $fd_decs . "')";

        mysqli_query($con, $sql);
        $qurey = mysqli_query($con, $sql);

        $_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Thank you for your feedback! Have a Great Day! </div>';

        #contact
        header("Refresh:0; url=index.php/#contact");
    }

    //catch exception
    catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
        header("Refresh:0; url=index.php/#contact");
    }
}
