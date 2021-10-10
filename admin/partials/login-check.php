<?php 

    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user'])) //IF user session is NOT SET (!isset), this session is set, only if user is logged in - user is defined in login.php file
    {
        //User is not logged in
        //REdirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        //REdirect to Login Page
        header('location:'.SITEURL.'admin/login.php');
    }

?>