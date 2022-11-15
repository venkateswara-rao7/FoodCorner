
<?php
session_start();

require_once('php/createDb.php');
require_once('./php/component.php');

//create db
  $db = new createDb("Productdb", "Producttb");

  if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodCorner.com</title>
    <link rel="stylesheet" href="style.css">
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="form.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

</head>
 <body>
     <h3 class="logo">
      
      <img src="https://webstockreview.net/images/clipart-restaurant-restaurant-logo-5.png" alt="logo" class=" nofocus" tabindex="0" aria-label="See the source image" data-bm="81" width="50px" height="40px">
      
      <small>FoodCorner</small></h3>

     <!--sidebar-->
     <div class="sidebar">
        <div class="sidebar-menu">
            <img src="https://img.icons8.com/glyph-neue/64/null/search--v1.png" width="27px" height="27px">
            <a href="index.php" target="_blank">Search</a>
        </div>
        <div  class="sidebar-menu">
            <img src="https://img.icons8.com/material-sharp/24/null/home-page.png" width="27px" height="27px"/>
            <a href="#">Home</a>
        </div>
        <div  class="sidebar-menu">
            <img src="https://img.icons8.com/ios-glyphs/30/null/like--v1.png" width="27px" height="27px">
            <a href="#">Favs</a>
        </div>
        <div  class="sidebar-menu">
            <img src="https://img.icons8.com/material-sharp/24/null/guest-male.png" width="27px" height="27px"/>
            <a href="#">Profile</a>
        </div>
        <div  class="sidebar-menu">
            <img src="https://img.icons8.com/external-aficons-studio-glyph-aficons-studio/17/null/external-settings-user-interface-aficons-studio-glyph-aficons-studio.png" width="27px" height="27px"/>
            <a href="#">Settings</a>
         </div>
       </div>

     <!--maindashboard-->
     <div class="dashboard">
        <div class="dashboaard-banner">
            <img src="images/image-banner.jpg">
            <div class="banner-promo">
                <h1><span>50% OFF <br></span>
                ON YOUR </br> FIRST ORDER</h1>
            </div>
        </div>
        <h3 class="dashboard-title"> Recommended For You</h3>
        <div class="dashboard-menu">
            <a href="#">Favorites</a>
            <a href="#">Best Seller</a>
            <a href="#"> Near Me</a>
            <a href="#"> Top Rated</a>
            <a href="#">Promotion</a>
            <a href="#">All</a>
        </div>

        <div class="dashboard-title"><h3>our top deals</h3></div>

           <div class="dashboard-content">       

           <?php

               require_once('php/head.php');

          ?>
              <div class="container">
       <div class="row text-center py-5">

              <?php
    
             $result = $db->getData();
                 while ($row = mysqli_fetch_assoc($result)){
                       images($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
            }
 
                  ?>

       </div>
   </div>
          </div>    
          <!--footer-->
          <footer class="footer">
            <div class="container">
                <div class="row">
                <div class="col-sm-3">
                    <h4 class="title">
                      <img src="https://webstockreview.net/images/clipart-restaurant-restaurant-logo-5.png" alt="logo" class=" nofocus" tabindex="0" aria-label="See the source image" data-bm="81" width="50px" height="50px">

                      FoodCorner</h4>

                    <p>The customer is very important, the customer will be followed by the customer. He takes up food, he will be chased free by the employee.</p>
                    <ul class="social-icon">
                    <a href="fb.com" class="social"><i class="fa-brands fa-facebook"></i></a>
                    <a href="twitter.com" class="social"><i class="fa-brands fa-square-twitter"></i></a>
                    <a href="instagram.com" class="social"><i class="fa-brands fa-instagram"></i></i></a>
                    <a href="youtube.com" class="social"><i class="fa-brands fa-youtube"></i></i></a>
                    <a href="google.com" class="social"><i class="fa-brands fa-google-plus"></i></i></a>
                   
                    </ul>
                    </div>
                <div class="col-sm-3">
                    <h4 class="title">My Account</h4>
                    <span class="acount-icon">          
                    <a href="#"><i class="fa fa-heart"  aria-hidden="true"></i> Wish List</a>
                    <a href="cart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                    <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Language</a>           
                  </span>
                    </div>
                <div class="col-sm-3">
                    <h4 class="title">Category</h4>
                    <div class="category">
                    <a href="#">pizza</a>
                    <a href="#">burger</a>
                    <a href="#">ice cream</a>
                    <a href="#">sea food</a>
                    <a href="#">american obtract</a>
                    
                               
                    </div>
                    </div>
                <div class="col-sm-3">
                    <h4 class="title">Payment Methods</h4>
                    <p></p>
                    <ul class="payment">
                    <li><a href="#"><i class="fa-brands fa-cc-amex"></i></i></a></li>
                    <li><a href="#"><i class="fa-regular fa-credit-card"></i></i></a></li>            
                    <li><a href="#"><i class="fa-brands fa-paypal"></i></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-cc-visa"></i></i></a></li>
                    </ul>
                    </div>
                </div>
                <hr>
                
                <div class="row text-center"> © 2017. Made with  by Food circles.com</div>
                </div>
                
                
            </footer>
            
           
        </div>
     <!--orderdashboard-->
       <div class="dashboard-order">
        <h3>Register Now</h3> 
        <div class="order-address">
          
        </div>
         
          <div>
            <h4>Enter your details</h4>

          </div>
          

          <form class="row g-3 needs-validation"  validate>
            <div >
              <label for="validationCustom01" class="form-label">Full name</label>
              <input type="text" class="form-control" id="n1" placeholder="venkatesh">
              <div class="valid-feedback">
            
              </div>
            </div>
           
            <div >
              <label for="validationCustom02" class="form-label">Email</label>
              <input type="email" class="form-control" id="e1" placeholder="example@gmail.com" >
              <div class="valid-feedback">
                
              </div>
            </div>

            <div >
              <label for="validationCustom03" class="form-label">Password</label>
              <input type="password" class="form-control" id="p1" placeholder="Pwd must be min 6 charecters" >
              <div class="valid-feedback">
              
              </div>
            </div>
            
            <div class="col-md-6">
              <label for="validationCustom04" class="form-label">City</label>
              <input type="text" class="form-control" id="validationCustom01" >
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom05" class="form-label">State</label>
              <select class="form-select" id="validationCustom02" aria-describedby="validationServer05Feedback" required>
                <option selected disabled value="">Choose</option>
                <option>Andhra prdesh</option>
                <option>Telangana</option>
                <option>Tamilnadu</option>
                <option>Kerala</option>
                <option>Karnataka</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid state.
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom06" class="form-label">Zip</label>
              <input type="text" class="form-control" id="validationCustom03" required>
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
            <div class="col-12">
            <input type="button" class="btn btn-primary" onClick="create_account();" value="Submit form">
             
            </div>
          </form>

          
        
  

          </div>
           <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        
      </body>
</html>    