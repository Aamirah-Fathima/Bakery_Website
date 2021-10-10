<?php 

    //Include constants.php file here, as we are not including menu pfp file for this page
    include('../config/constants.php');

    // 1. get the ID of Admin to be deleted
    $id = $_GET['id']; // from manage admin page, the delete admin button 

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and Admin Deleted
        //echo "Admin Deleted";
        //Create SEssion Variable to Display Message
        // div tag, with success class from the css is to add green color to the msg
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to Manage Admin Page from the delete admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>