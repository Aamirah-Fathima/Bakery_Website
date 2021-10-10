<?php 

    include('../config/constants.php'); // constants file is in other folder, hence to call it, we use ..
    include('login-check.php'); // for checking, authorizing the admin user who logs in

?>


<html>
    <head>
        <title>Sweet Retreat Bakery - Home Page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->