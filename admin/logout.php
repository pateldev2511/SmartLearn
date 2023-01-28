<?php
session_start();

unset($_SESSION['user']);
$_SESSION['msg'] = 'Logout Successfuly';

header("Refresh:0; url=dashbord.php");
