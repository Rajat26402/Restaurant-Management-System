<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];//display session message
                unset($_SESSION['add']);//remove session message
            }
        
        ?>
        <form action="" method="POST">

        <table class="tbl30">
            <tr>
                <td>Full Name: </td>
                <td><input type="text" name="full_name" placeholder="Enter your name"></td>
            </tr>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username" placeholder="Enter your username"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>
                    <input type="password" name="password" placeholder="Enter your password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btnsec">
                </td>
            </tr>
        </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php');?>

<?php 
    //Process the value from form and save it in database

    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
       // echo "Button Clicked";

       //get data from forms
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];
       $password = md5($_POST['password']); //password encryption by md5

       //sql query to save into database
       $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
       ";
        
       //execut query and save data in db
       $res = mysqli_query($conn, $sql)  or die(mysqli_error());
       
       //check whether data is inserted or not
       if($res==TRUE)
       {
            //echo "Inserted";
            //Create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin added Successfully</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
       }
       else
       {
            //echo "Failed";
            $_SESSION['add'] = "<div class='error'>Failed to add Admin</div>";
            header("location:".SITEURL.'admin/add-admin.php');
       }
}
    
?>