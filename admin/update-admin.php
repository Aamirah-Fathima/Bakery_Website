<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <!-- displaying the details of the admin we are updating -->
        <?php 
            //1. Get the ID of Selected Admin
            $id=$_GET['id']; // id taken from the button used in the manage admin page, id is the vairable used to get the admin

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res); // counting the no. of rows
                //Check whether we have admin data or not, also doing this to avoid hacking
                if($count==1)
                {
                    // if count ==1 then we Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res); // get the details of admin

                    $full_name = $row['full_name']; // passing the column name in the db
                    $username = $row['username'];
                }
                else
                {
                    //or else we Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>"> <!-- Here, echo $full_name, echo's the name fetched from the db-->
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2"> <!-- we merge 2 columns, as we have 2 cols in every row -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- keeping the id of the admin hidden-->
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<!-- Updating the value after clicking the submit button-->
<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update them
        $id = $_POST['id']; // since we are passing the value in the for using POST method, are are getting it through it
        $full_name = $_POST['full_name']; 
        $username = $_POST['username'];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }

?>


<?php include('partials/footer.php'); ?>