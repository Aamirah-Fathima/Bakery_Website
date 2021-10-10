<?php 
    //Include constants.php for SITEURL
    include('../config/constants.php');
    //1. Query to Destory the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. Then redirect to Login Page
    header('location:'.SITEURL.'admin/login.php');

?>