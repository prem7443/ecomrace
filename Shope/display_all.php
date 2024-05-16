<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shope</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   <!-- css file -->
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
         <!-- first child -->
         <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <img src="./images/d.png" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_registration.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total price:<?php total_cart_price();?>/-</a>
      </li>
      
        
    </ul>
      <form class="d-flex">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    <div>
  </div>
</nav>
<!-- second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
      <?php
      if(!isset($_SESSION['username'])){
        echo " <li class='nav-item'>
         <a class='nav-link' href='#'>Welcome Guest</a>
       </li>";
       } else{
         echo "  <li class='nav-item'>
         <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
       </li>";
       }
      if(!isset($_SESSION['username'])){
        echo "  <li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Logout</a>
      </li>";
      } else{
        echo "  <li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Login</a>
      </li>";
      }
      
      ?>
  </ul>
</nav>
<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">J K TRADING</h3>
  <p class="text-center">deals are in mobile phones of all brand</p>
</div>

<!-- forth child -->
<div class="row px-1">
  <div class="col-md-10">
    <!-- produtes -->
      <div class="row">
<!-- fatching produtes -->
      <?php
get_all_products();
get_uniqe_categories();
get_uniqe_brands();

      ?>
<!-- row end -->
</div>
<!-- col end-->
</div>  
  <div class="col-md-2 bg-secondary p-0">
     <!-- brands to be displayed -->
    <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a herf="#" class="nav-link text-light"><h5>Delevry brand </h5></a>
    </li>
    <?php
    getbrands();

?>
    </ul>
    
 
  
    
     <!-- categories to be displayed -->
     <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a herf="#" class="nav-link text-light"><h5>categories</h5></a>
    </li>
    <?php

getcategories();

?>

    </ul>
    
  </div>

  
    
    
  </div>
</div>

  
  
<!-- last child --> 
<!-- include footer -->
<?php include("./includes/footer.php") ?>
  


  
    </div>
          
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>