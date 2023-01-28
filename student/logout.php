<?php
session_start();

$_SESSION['msg'] = 'Loged Out Sucessfully';
unset($_SESSION['user']);
unset($_SESSION['name']);
unset($_SESSION['s_temp_id']);
unset($_SESSION['s_email']);
unset($_SESSION['s_address']);
unset($_SESSION['s_pincode']);
unset($_SESSION['s_doc']);

header('location:login.php');
