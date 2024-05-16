<?php
if (isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from `products` where product_id= $edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result); 
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_imei=$row['product_imei'];
    $product_colour=$row['product_colour'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    // $product_image2=$row['product_image2'];
    // $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];

    // fetching category name
    $select_category="Select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    // echo $category_title;
    
     // fetching barnd name
     $select_brand="Select * from `brands` where brand_id=$brand_id";
     $result_brand=mysqli_query($con,$select_brand);
     $row_brand=mysqli_fetch_assoc($result_brand);
     $brand_title=$row_brand['brand_title'];
    //  echo $brand_title;
}

?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</lable>
            <input type="text" id="product_title"  value="<?php echo $product_title?>" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</lable>
            <input type="text" id="product_desc" name="product_desc" value="<?php echo $product_description?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_imei" class="form-label">product IMEI</lable>
            <input type="text" id="product_imei" name="product_imei" value="<?php echo $product_imei?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_colour" class="form-label">Product Colour</lable>
            <input type="text" id="product_colour" name="product_colour" value="<?php echo $product_colour?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">product Category</lable>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                <?php
                 $select_category_all="Select * from `categories`";
                 $result_category_all=mysqli_query($con,$select_category_all);
                 while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo " <option value='$category_id'>$category_title</option>";
                 };
    
                ?>
               
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brands" class="form-label">product Brands</lable>
            <select name="product_brands" class="form-select">
            <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
            <?php
                 $select_brand_all="Select * from `brands`";
                 $result_brand_all=mysqli_query($con,$select_brand_all);
                 while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                    $brand_title=$row_brand_all['brand_title'];
                    $brand_id=$row_brand_all['brand_id'];
                    echo " <option value='$brand_id'>$brand_title</option>";
                 };
    
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">product Image1</lable>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</lable>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required" value="<?php echo $product_price?>">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- editing product -->

<?php 

if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_imei=$_POST['product_imei'];
    $product_colour=$_POST['product_colour'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_title=$_POST['product_title'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];

    // checking for fields empty or not
    if($product_title=='' or $product_desc=='' or $product_imei=='' or $product_colour=='' or $product_category=='' or $product_brands=='' or $product_image1=='' or $product_price==''){
        echo "<script>alert('plese fill all the fileds and continue the process')</script>";
    }else{
        move_uploaded_file( $temp_image1,"./product_images/$product_image1");

        // query to update products 
        $update_product="update `products` set product_title='$product_title', product_description='$product_desc', product_imei='$product_imei', product_colour='$product_colour', category_id='$product_category', brand_id='$product_brands',product_image1='$product_image1',product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if ($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./index.php',_self)</script>";

        }
    }
}


?>