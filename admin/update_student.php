<?php

include 'connection.php';
session_start();

if ($_SESSION['user'] != 'admin') {

    $_SESSION['msg'] = 'Need To Login';
    header("Refresh:0; url=dashbord.php");
    # code...
}
if (isset($_POST['edit_student'])) {

    $id = $_REQUEST['s_id'];

    echo $id;

    $s_name = $_POST['s_name'];

    $s_email = $_POST['s_email'];

    $s_address = mysqli_real_escape_string($con, $_POST['s_address']);

    $s_pincode = $_POST['s_pincode'];

    $s_status = 'yes';

    $date = date('Y-m-d H:i:s');

    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES["image"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $_SESSION['msg'] = "Please Select Image File Only";
        header("Refresh:0; url=edit_student.php");
    } else {

        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../student/docs/" . $filename;
    }


    $check_email = "SELECT `s_email` FROM `student` WHERE `s_email`='" . $s_email . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    if ($matchFound == "yes") {

        if (move_uploaded_file($tempname, $folder)) {
            # code...

            $sql = "UPDATE `student` SET `s_name`='" . $s_name . "',`s_address`='" . $s_address . "',`s_pincode`='" . $s_pincode . "',`s_email`='" . $s_email . "',`s_document`='" . $filename . "' WHERE  `s_id`='" . $id . "'";

            mysqli_query($con, $sql);

            $_SESSION['msg'] = "Account Edited Sucessfully.";
            header("Refresh:0; url=edit_student.php");
        } else {

            $_SESSION['msg'] = 'Sorry! Something Went Wrong please Try Again';
            header("Refresh:0; url=student_data.php");
        }
    } else {
        $_SESSION['msg'] = "No account Found.";
        header("Refresh:0; url=student_data.php");
    }
}
