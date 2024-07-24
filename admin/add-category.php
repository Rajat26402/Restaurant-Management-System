<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];//display session message
                unset($_SESSION['add']);//remove session message
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];//display session message
                unset($_SESSION['upload']);//remove session message
            }
        ?>
        <br><br>
        <!-- Add category starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btnsec">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Add category ends -->
        <?php 
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                //get value from form
                $title=$_POST['title'];
                //for radio type
                if(isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];
                }
                else
                {
                    $featured="No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                //check image is selecte or not and set value
                //print_r($_FILES['image']);
                //die();

                if(isset($_FILES['image']['name']))
                {
                    //to upload image we need path and name
                    $image_name = $_FILES['image']['name'];
                    if($image_name!="")
                        {

                        
                            //auto rename image
                            $ext = end(explode('.',$image_name));
                            $image_name = "Food_Category_".rand(000, 999).'.'.$ext;

                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path="../images/category/".$image_name;

                            //upload image
                            $upload = move_uploaded_file($source_path, $destination_path);

                            if($upload==FALSE)
                            {
                                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                                header('location:'.SITEURL.'admin/add-category.php');
                                die();
                            }
                        }
                }
                else
                {
                    $image_name="";
                }

                ///sql query to insert
                $sql = "INSERT INTO tbl_category SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                ";

                $res = mysqli_query($conn, $sql);
                if($res==TRUE)
                {
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to add Category.</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>