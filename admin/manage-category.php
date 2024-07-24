<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage Category</h1>

    <br /><br /> 
    <?php
        if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];//display session message
                unset($_SESSION['add']);//remove session message
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];//display session message
                unset($_SESSION['remove']);//remove session message
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];//display session message
                unset($_SESSION['delete']);//remove session message
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];//display session message
                unset($_SESSION['no-category-found']);//remove session message
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];//display session message
                unset($_SESSION['update']);//remove session message
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];//display session message
                unset($_SESSION['upload']);//remove session message
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];//display session message
                unset($_SESSION['failed-remove']);//remove session message
            }
        ?>
        <br><br>
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btnprim">Add Category</a>
        <br /> <br /> <br />
        <table class="tblfull">
            <tr>
                <th>S.NO.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featutred</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
                $sql = "SELECT * FROM tbl_category";
                $res = mysqli_query($conn, $sql);
                $count=mysqli_num_rows($res);
                $sn=1;
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title= $row['title'];
                        $image_name= $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                        ?>
                        <tr>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo $title;?></td>

                            <td>
                                <?php 
                                if($image_name!="")
                                {
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="100px">
                                    <?php
                                }
                                else
                                {
                                    echo "<div class='error'>Image not added.</div>";
                                }
                                ?>
                            </td>

                            <td><?php echo $featured;?></td>
                            <td><?php echo $active;?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>" class="btnsec">Update Category</a>
                                <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btndan">Delete Category</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <tr>
                        <td colspan="6"><div class="error">No Category Added</div></td>
                    </tr>
                    <?php

                }
            ?>
            
        </table>
    </div>
</div>

<?php include('partials/footer.php');?>