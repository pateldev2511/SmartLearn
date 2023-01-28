<?php

include 'connection.php';
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Load Composer's autoloader
require 'autoload.php';
session_start();


if (isset($_POST['create']) and $_SESSION['user'] != 'teaher' or $_SESSION['user'] != 'student') {

    $st_name = $_POST['st_name'];

    $st_email = $_POST['st_email'];

    $st_address = mysqli_real_escape_string($con, $_POST['st_address']);

    $st_pincode = $_POST['st_pincode'];

    $st_mobile = $_POST['st_mobile'];

    $st_password = md5($_POST['st_password']);

    $st_status = 'no';

    $token =  rand(111111, 999999) . '-' . uniqid();

    $date = date('Y-m-d H:i:s');

    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES["image"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $_SESSION['msg'] = "Please Select Image File Only";
        header("Refresh:0; url=registration.php");
    } else {

        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "docs/" . $filename;
    }



    // $file = $_FILES['file']['tmp_name'];
    // if (file_exists($file)) {
    //     $imagesizedata = getimagesize($file);
    //     if ($imagesizedata === FALSE) {
    //         $_SESSION['error'] = 'Please select Image File'
    //     } else {
    //         //image
    //         //use $imagesizedata to get extra info
    //     }
    // } else {
    //     //not file
    // }

    $check_email = "SELECT `st_email` FROM `staff` WHERE `st_email`='" . $st_email . "'";

    $check = mysqli_query($con, $check_email);

    $matchFound = mysqli_fetch_row($check) > 0 ? 'yes' : 'no';

    if ($matchFound == "yes") {
        $_SESSION['msg'] = "Email number Already exist";
        header("Refresh:0; url=registration.php");
    } else {

        if (move_uploaded_file($tempname, $folder)) {
            # code...

            $isInserted = 0;
            $isEmailSend = 0;
            try {
                $sql = "INSERT INTO `staff`(`st_name`,`st_email`,`st_password`,`st_mobile`, `st_address`,  `st_pincode`,   `st_document`, `st_create`, `st_token`,`st_active`) VALUES ('" . $st_name . "','" . $st_email . "','" . $st_password . "','" . $st_mobile . "','" . $st_address . "','" . $st_pincode . "','" . $filename . "','" . $date . "','" . $token . "','" . $st_status . "')";

                mysqli_query($con, $sql);
                $sql = "select *from staff where st_id=(SELECT LAST_INSERT_ID());";

                $qurey = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($qurey)) {

                    $name = $row['st_name'];
                    $del_id = $row['st_id'];
                    $add = $row['st_address'];
                    $email = $row['st_email'];
                    $pincode = $row['st_pincode'];
                    $doc = $row['st_document'];
                }
                $_SESSION['msg'] = "Account Created Sucessfully. Please Login.";
                $isInserted = 1;
            }

            //catch exception
            catch (Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }
            if ($isInserted == 1) {
                # code...



                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'incognit.squad@gmail.com';                     // SMTP username
                    $mail->Password   = 'incognit@123';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom($mail->Username, 'support@smartlearn.com');
                    // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
                    $mail->addAddress($st_email);               // Name is optional
                    //$mail->addReplyTo('info@example.com', 'Information');
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');

                    // Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Smart Learn Student Verification';
                    $mail->Body    = 'Hi ' . $st_name . ', <br> Please <a href="localhost/smartlearn/staff/staff_verify.php?token=' . $token . '">Click Here</a> to Verify email';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    $isEmailSend = 1;
                } catch (Exception $e) {
                }
                if ($isEmailSend == 1) {
                    # code...
                    $_SESSION['msg'] = 'Account Created Successfully! Please Verify your Email';
                    header("Refresh:0; url=login.php");
                } else {

                    $sql = "DELETE FROM `staff` WHERE `st_id`=" . $del_id;

                    mysqli_query($con, $sql);

                    $_SESSION['msg'] = 'Somthing Went Wrong Please try again.';
                    echo 'Error';
                    exit();
                    // header("Refresh:0; url=registration.php");
                }
            }
            // $_SESSION['msg'] = "Teacher: Account Created Sucessfully. Please Login.";
            // header("Refresh:0; url=login.php");
        } else {
            $_SESSION['msg'] = 'Sorry! Something Went Wrong please Try Again';
            // header("Refresh:0; url=registration.php");

            echo 'Error';
            exit();
        }
    }
}
