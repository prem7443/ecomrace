<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_imei=$_POST['product_imei'];
    $product_colour=$_POST['product_colour'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    
    // accessing images
   $product_image1=$_FILES['product_image1']['name'];
   $product_image2=$_FILES['product_image2']['name'];
   $product_image3=$_FILES['product_image3']['name'];

    // accessing image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];


    //cheking empty condition
    if($product_title=='' or $description=='' or $product_imei=='' or $product_colour=='' or $product_category=='' or $product_brands==''  or $product_price=='' or  $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Plese fill all the available fields') </script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        // insert query
        $insert_products="insert into `products`(product_title,product_description,product_imei,product_colour,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$description','$product_imei','$product_colour','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),$product_status)";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
        echo "<script>alert('Successfully insrted the products')</script>";

        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inseet Products-Admin Dashboard</title>
  <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css file -->
  <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
             <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-lable">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product_title" autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-lable">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product_description" autocomplete="off" required="required">
            </div>

            <!-- Product IMEI -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_imei" class="form-lable">Product imei</label>
                <input type="text" name="product_imei" id="product_imei" class="form-control" placeholder="Enter product_imei" autocomplete="off" required="required">
            </div>

            <!-- Product colour -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_colour" class="form-lable">Product colour</label>
                <input type="text" name="product_colour" id="product_colour" class="form-control" placeholder="Enter product_colour" autocomplete="off" required="required">
            </div>


            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query="Select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc( $result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }


                ?>
                   
                </select>
            </div>

            <!-- Brands-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                <option value="">Select a Brands</option>
                <?php
                    $select_query="Select * from `brands`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }


                ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">product_image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">product_image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">product_image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-lable">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product_price" autocomplete="off" required="required">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name=" insert_product" class="btn btn-info mb-3 px-3" value="Insert_product">
            </div>


    
        </form>
     
               
    </div>
    </body>
</html>