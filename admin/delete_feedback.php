<?php
include "connection.php";
error_reporting(0);
session_start();

if ($_SESSION['user'] != 'admin') {

    $_SESSION['msg'] = 'Need To Login';
    header("Refresh:0; url=dashbord.php");
    # code...
}
$sql = "DELETE FROM `feedback` WHERE  `fd_id`='" . $_GET['id'] . "'";
mysqli_query($con, $sql);



// echo "Enter Value sucessfully";
$_SESSION['msg'] = "Updated Sucessfuly";

header("Refresh:0; url=student_data.php");
