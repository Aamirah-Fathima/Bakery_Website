<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <!-- displaying the message -->
        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>
        
<!--creating form to add an admin -->
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary"> <!-- this submit button is checked, if clicked or not-->
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php 
    //Process the Value from the add admin Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    { // the isset function checks if the submit button is passed through the POST method or not
        // if its passed then: Button Clicked
        //or else: echo "Button Clicked";

        //Step 1 to process the data, is to get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5

        //Step 2. SQL Query to Save/insert the data into database using SET  sql query
        //id variable is not used, as in the DB, its autoincrement
        // LHS are the variables in the DB, RHS are the values from the form
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
 
        //3. Executing Query and Saving Data into Datbase, res- result varaiable, holds true or false, according to the query result
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>"; //using instaed of echo, as session variable that can be accessibleamong different pages, but the value will be last or will be stored as long as the browser is open
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php'); // the dot/period is used for concatentaing, It concatenates the homeURL and the manage admin page: which is: http://localhost/food-order/admin/manage-admin.php
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
    
?>