<?php 
include('../config/constants.php');
//get id of admin to delete
$id = $_GET['id'];
//create sql query to delete
$sql = "DELETE FROM tbl_admin WHERE id=$id";
//redirect to manage admin page
$res = mysqli_query($conn, $sql);
if($res==TRUE)
{
    //echo "Admin Deleted";
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //echo "Failed";
    $_SESSION['delete'] = "<div class='error'>Failed to delete Admin. Try again later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
?>