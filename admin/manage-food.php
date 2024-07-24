<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage Food</h1>

    <br /><br /> 
        <a href="<?php echo SITEURL;?>admin/add-food.php" class="btnprim">Add Food</a>
        <br /> <br /> <br />
        <?php

            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];//display session message
                unset($_SESSION['add']);//remove session message
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];//display session message
                unset($_SESSION['delete']);//remove session message
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];//display session message
                unset($_SESSION['upload']);//remove session message
            }

            if(isset($_SESSION['unauthorized']))
            {
                echo $_SESSION['unauthorized'];//display session message
                unset($_SESSION['unauthorized']);//remove session message
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];//display session message
                unset($_SESSION['update']);//remove session message
            }

            if(isset($_SESSION['remove-failed']))
            {
                echo $_SESSION['remove-failed'];//display session message
                unset($_SESSION['remove-failed']);//remove session message
            }


        ?>
        <table class="tblfull">
            <tr>
                <th>S.NO.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
                $sql = "SELECT * FROM tbl_food";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn =1;
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured= $row['featured'];
                        $active = $row['active'];
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php 
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image not Added.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" width="100px">
                                        <?php
                                    }
                                    ?>
                                    </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btnsec">Update Food</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btndan">Delete Food</a>
                            </td>
                        </tr>
                        <?php

                            
                
                        
                        
                    }
                }
                else
                {
                    echo "<tr><td colspan='7' class='error'>Food not Added Yet.</td></tr>";
                }
            ?>
          

        </table>
    </div>
</div>

<?php include('partials/footer.php');?>