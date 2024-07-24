<?php include('partials/menu.php');?>

<!-- Main Section Ends -->
<div class="main-content">
<div class="wrapper">
        <h1>Manage Admin</h1>

        <br />
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];//display session message
                unset($_SESSION['add']);//remove session message
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['user_not_found']))
            {
                echo $_SESSION['user_not_found'];
                unset($_SESSION['user_not_found']);
            }

            if(isset($_SESSION['pwd_not_match']))
            {
                echo $_SESSION['pwd_not_match'];
                unset($_SESSION['pwd_not_match']);
            }

            if(isset($_SESSION['change_pwd']))
            {
                echo $_SESSION['change_pwd'];
                unset($_SESSION['change_pwd']);
            }
        
        ?>
        <br><br>
        <a href="add-admin.php" class="btnprim">Add Admin</a>
        <br /> <br /> <br />
        <table class="tblfull">
            <tr>
                <th>S.NO.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php 

                $sql = "SELECT * FROM tbl_admin";
                $res = mysqli_query($conn, $sql);
                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res);
                    $sn=1;
                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btnprim">Change Password</a>
                                 <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btnsec">Update Admin</a>
                                 <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btndan">Delete Admin</a>
                                </td>
                             </tr>
                            <?php
                        }
                    }
                    else
                    {

                    }
                }
            ?>
           
        </table>
        
</div>
</div>
<!-- Main ENDS -->

<?php include('partials/footer.php');?>