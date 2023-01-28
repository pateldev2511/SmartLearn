<?php

include 'connection.php';
session_start();

if ($_SESSION['user'] != 'teacher') {

    $_SESSION['msg'] = 'Need To Login';
    header("Refresh:0; url=login.php");
    # code...
}
if (isset($_POST['edit_staff']) and $_SESSION['user'] == 'teacher') {

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
        $folder = "docs/" . $filename;
    }


    $check_email = "SELECT `st_email` FROM `staff` WHERE `st_email`='" . $s_email . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    if ($matchFound == "yes") {

        if (move_uploaded_file($tempname, $folder)) {
            # code...

            $sql = "UPDATE `staff` SET `st_name`='" . $s_name . "',`st_email`='" . $s_email . "',`st_mobile`='" . $s_mobile . "',`st_address`='" . $s_address . "',`st_pincode`='" . $s_pincode . "',`st_document`='" . $filename . "' WHERE  `st_id`='" . $id . "'";

            mysqli_query($con, $sql);

            $sql = "SELECT `st_id`, `st_name`,`st_email`,`st_password`,`st_mobile`, `st_address`,  `st_pincode`,   `st_document`, `st_create` FROM `staff` WHERE  `st_id`='" . $id . "'";

            $qurey = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_array($qurey)) {

                $name = $row['st_name'];
                $temp_id = $row['st_id'];
                $add = $row['st_address'];
                $email = $row['st_email'];
                $pincode = $row['st_pincode'];
                $doc = $row['st_document'];
                $mobile = $row['st_mobile'];
            }
            $_SESSION['name'] = $name;
            $_SESSION['st_name'] = $name;
            $_SESSION['st_temp_id'] = $temp_id;
            $_SESSION['st_email'] = $email;
            $_SESSION['st_address'] = $add;
            $_SESSION['st_pincode'] = $pincode;
            $_SESSION['st_doc'] = $doc;
            $_SESSION['st_mobile'] = $mobile;
            $_SESSION['user'] = 'teacher';

            $_SESSION['msg'] = "Account Edited Sucessfully.";
            header("Refresh:0; url=profile_view.php");
        } else {

            $_SESSION['msg'] = 'Sorry! Something Went Wrong please Try Again';
            header("Refresh:0; url=edit_staff.php");
        }
    } else {
        $_SESSION['msg'] = "No account Found.";
        header("Refresh:0; url=profile_view.php");
    }
}
