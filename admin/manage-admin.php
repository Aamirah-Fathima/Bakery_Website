<?php include('partials/menu.php'); ?>


        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br />

                <!-- to display the message, after adding or deleteing an admin-->
                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Displaying Session Message
                        unset($_SESSION['add']); //REmoving Session Message, so that the message is shown just once, it goes away after refreshin the page
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; // the delete variable is in the delete admin page, and session makes the msg show in the redirected manage admin page
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; //displaying the msg if admin is updated
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found']; //if id of the user is not there, then we get user not found msg || if user id and pawsd doesnt match, then too we get this msg - chnage paswd
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    { //if the passwords in the change passwords do not match
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];// using same session variable for both success or failure of changing/updating the passwords
                        unset($_SESSION['change-pwd']);
                    }

                ?>
                <br><br><br>

                <!-- Button to Add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th> <!-- buttons, add or delete admins -->
                    </tr>

                    
                    <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //CHeck whether the Query is Executed of Not
                        if($res==TRUE)
                        {
                            // Count Rows to CHeck whether we have data in database or not
                            $count = mysqli_num_rows($res); // this function is used to get all the no. of rows in database

                            $sn=1; //Create a Variable for serial number in the table of  list of admins and Assign the value 1, so that its incremented later

                            //CHeck the num of rows
                            if($count>0)
                            {
                                //if we have data in database, we need to display it all on the admin page, using while loop for it
                                // rows variable will have all the fetched data from the rows in the db
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual DAta
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    // not displaying the password

                                    
                                    ?>
                                    <!--Display the Values in our Table-->
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td> 
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                    <?php

                                }
                            }
                            else
                            {
                                //We Do not Have Data in Database
                            }
                        }

                    ?>


                    
                </table>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); ?>