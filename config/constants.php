<?php 
    //Start Session
    session_start(); // starts session in ll pages

    //everytime we execute a query, we need to connect to db and selecet the db, hence this code is made common, to be used in all the pages of the admin side
    // instead of calling this file in all the pages, we add/ include this file in the menu.php file

    //Create Constants (non chnaging) to Store Non Repeating Values
    define('SITEURL', 'http://localhost/food-order/'); //homeURL
    define('LOCALHOST', 'localhost:3307');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database


?>