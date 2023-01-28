<?php
session_start();

$_SESSION['msg'] = 'Loged Out Sucessfully';
unset($_SESSION['user']);
unset($_SESSION['name']);
unset($_SESSION['st_temp_id']);
unset($_SESSION['st_email']);
unset($_SESSION['st_address']);
unset($_SESSION['st_pincode']);
unset($_SESSION['st_doc']);
unset($_SESSION['st_mobile']);

header('location:login.php');
