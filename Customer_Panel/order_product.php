<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


<!-- Select particular product details -->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['product_id']))
   {

     $shop_id    = $_GET['shop_id'];
     $product_id = $_GET['product_id'];

     $sql = "SELECT * FROM tb_product WHERE shop_id = $shop_id AND product_id = $product_id";

     $result = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
       $product_image_1       = $getData['product_image_1'];
       $product_id            = $getData['product_id'];
       $product_name          = $getData['product_name'];
       $product_code          = $getData['product_code'];
       $product_price         = $getData['product_price'];
       $product_type          = $getData['product_type'];
       $shop_id               = $getData['shop_id'];
       $shop_name             = $getData['shop_name'];
       $shop_code             = $getData['shop_code'];
       $shop_location         = $getData['shop_location'];
       $shop_location_details = $getData['shop_location_details'];
       $shop_image            = $getData['shop_image'];

       $name            = $getData['name'];
       $email           = $getData['email'];
       $phone           = $getData['phone'];
       $address         = $getData['address'];
       $shop_owner      = $getData['shop_owner'];
     }
   }
  ?>


  <!-- Select customer details -->
 <?php
     $user_name = $_SESSION['user_name'];
     error_reporting( error_reporting() & ~E_NOTICE );
     $db = new Database();

     $sql = "SELECT * FROM tb_user WHERE user_name = '$user_name'";

     $result = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
       $name            = $getData['name'];
       $email           = $getData['email'];
       $phone           = $getData['phone'];
       $address         = $getData['address'];
     }
  ?>



  <!-- Product order section -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {

         $customer_name         = $_POST['customer_name'];
         $customer_email        = $_POST['customer_email'];
         $customer_phone        = $_POST['customer_phone'];
         $customer_address      = $_POST['customer_address'];
         $product_id            = $_POST['product_id'];
         $product_name          = $_POST['product_name'];
         $product_code          = $_POST['product_code'];
         $product_price         = $_POST['product_price'];
         $product_type          = $_POST['product_type'];
         $product_image         = $product_image_1;
         $shop_id               = $_POST['shop_id'];
         $shop_name             = $_POST['shop_name'];
         $shop_code             = $_POST['shop_code'];
         $shop_image            = $shop_image;
         $shop_location         = $shop_location;
         $shop_location_details = $_POST['shop_location_details'];
         $quantity              = $_POST['quantity'];
         $order_date            = $_POST['order_date'];
         $customer_msg          = $_POST['customer_msg'];
         $order_by              = $user_name;
         $order_code            = rand(100000, 999999);

         $shop_owner = $shop_owner;


         $sql = "INSERT INTO tb_order_product(order_code,customer_name,customer_email,customer_phone,customer_address,product_id,product_name,product_code,product_price,product_type,product_image,shop_id,shop_name,shop_code,shop_image,shop_location,shop_location_details,quantity,order_date,customer_msg,order_by,shop_owner,entry_time)values('$order_code','$customer_name','$customer_email','$customer_phone','$customer_address','$product_id','$product_name','$product_code','$product_price','$product_type','$product_image','$shop_id','$shop_name','$shop_code','$shop_image','$shop_location','$shop_location_details','$quantity','$order_date','$customer_msg','$order_by','$shop_owner','$current_datetime')";
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
           ?>

           <script type="text/javascript">
             window.alert("Your order request has been sent successfully. We will aprove your order as soon as possible. Pay first to confirm your order. Thank You!");
             window.location='product_details.php?product_id=<?php echo $product_id; ?>&shop_id=<?php echo $shop_id; ?>';
           </script>

          <?php
         }
         else 
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
           echo $msg;
           return false;
         }
   }

  ?>






<!DOCTYPE html>
<html lang="en">


<!-- molla/product.html  22 Nov 2019 09:54:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Binimoy.XYZ - Order Product</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">

    <!-- Fontawsome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/nav_logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/nav_logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/nav_logo.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/nav_logo.png" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/nav_logo.png">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper">
      <header class="header">
            <div class="header-top bg-success" style="color: white;">
                <div class="container">
                    <div class="header-left py-3">
                        <div>
                            <a href="product_details.php?product_id=<?php echo $product_id; ?>&shop_id=<?php echo $shop_id; ?>"><i class="icon icon-arrow-left"></i> Back to Product</a>
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                          <li>
                              <a href="#">Links</a>
                              <ul>
                                  <li><a href="tel:#"><i class="icon-phone"></i>Call : +880 1609-479393</a></li>
                                  <li><a href="#"><i class="icon-envelope"></i>E-mail : <span class="text-lowercase" style="color: white;">binimoy.xyz@gmail.com</span></a></li>
                                  <li><a href="#">Contact Us</a></li>
                              </ul>
                          </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.php" class="logo px-2">
                          <h4 class="d-inline"><img src="assets/nav_logo/1.png" width="35" class="d-inline mb-1"> <b style="font-family: 'Vollkorn', serif;"><span style="color: #4A5F84;">Binimoy</span>.<span class="text-danger">X</span><span class="text-info">Y</span><span class="text-success">Z</span></b></h4>
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="">Order Here</a>
                                </li>
                                <li>
                                <a href="dashboard.php">My Account</a>
                            </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                          <a onclick="return confirm('Sure to logout?')" href="logout_customer.php">
                            <i class="fa fa-sign-out"></i> Sign Out
                          </a>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="shop_details.php?shop_id=<?php echo $shop_id; ?>">Shop Page</a></li>
                        <li class="breadcrumb-item"><a href="product_details.php?product_id=<?php echo $product_id; ?>&shop_id=<?php echo $shop_id; ?>">Product Page</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Product</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">

                          <div class="col-9 m-auto shadow px-4 py-4" style="border-top: 1px solid; border-radius: 5px;">

                            <h6 class="mt-1">Order Product Here</h6><hr class="mt-0 mb-0">

                            <form class="px-3 py-3" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <label>Your Full Name *</label>
                                      <input type="text" name="customer_name" class="form-control" value="<?php echo $name; ?>" required>
                                    </div>

                                    <div class="col-sm-6">
                                      <label>Your Email *</label>
                                      <input type="text" name="customer_email" class="form-control" value="<?php echo $email; ?>" required>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <label>Your Phone Number *</label>
                                      <input type="text" name="customer_phone" class="form-control" value="<?php echo $phone; ?>" required>
                                    </div>

                                    <div class="col-sm-6">
                                      <label>Your Address *</label>
                                      <input type="text" name="customer_address" class="form-control" value="<?php echo $address; ?>" required>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label>Shop Id *</label>
                                      <input type="text" name="shop_id" class="form-control" value="<?php echo $shop_id; ?>" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                      <label>Shop Name *</label>
                                      <input type="text" name="shop_name" class="form-control" value="<?php echo $shop_name; ?>" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                      <label>Shop Code *</label>
                                      <input type="text" name="shop_code" class="form-control" value="<?php echo $shop_code; ?>" readonly>
                                    </div>
                                </div>

                                <div>
                                    <label>Shop Location *</label>
                                    <input type="text" name="shop_location_details" class="form-control" value="<?php echo $shop_location_details; ?>" readonly>
                                </div>

        			                   <div class="row">
                                    <div class="col-sm-4">
                                      <label>Product Id *</label>
                                      <input type="text" name="product_id" class="form-control" value="<?php echo $product_id; ?>" readonly>
                                    </div>

            			                	<div class="col-sm-4">
            			                		<label>Product Name *</label>
            			                		<input type="text" name="product_name" class="form-control" value="<?php echo $product_name; ?>" readonly>
            			                	</div>

                                    <div class="col-sm-4">
            			                		<label>Product Code *</label>
            			                		<input type="text" name="product_code" class="form-control" value="<?php echo $product_code; ?>" readonly>
            			                	</div>
          			                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                      <label>Product Price *</label>
                                      <input type="text" name="product_price" class="form-control" value="<?php echo $product_price; ?>" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                      <label>Product Type *</label>
                                      <input type="text" name="product_type" class="form-control" value="<?php echo $product_type; ?>" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                      <label>Product Image : <img src="<?php echo "../Shop_Owner_Panel/pages/".$product_image_1; ?>" height="60" alt="product_image"></label>
                                    </div>
                                </div>

                                  <div class="row">
      			                				<div class="col-sm-3">
                                      <label>Quantity *</label>
          		            						<input type="number" name="quantity" class="form-control" required>
      			                				</div>

                                    <div class="col-sm-9">
                                      <label>Order Date *</label>
                                      <input type="date" name="order_date" class="form-control" required>
                                    </div>
      			                			</div>

      		                				<label>Message *</label>
                                  <textarea class="form-control" name="customer_msg" placeholder="Message to seller..." rows="2"></textarea>

      		                				<input type="submit" name="submit" class="btn btn-primary btn-round" value="Submit Order">

      			               </form>

                          </div>

                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <footer class="footer footer-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <a href="index.php" class="logo px-2">
                                  <h4 class="d-inline"><img src="assets/nav_logo/1.png" width="35" class="d-inline mb-1"> <b style="font-family: 'Vollkorn', serif;"><span style="color: #4A5F84;">Binimoy</span>.<span class="text-danger">X</span><span class="text-info">Y</span><span class="text-success">Z</span></b></h4>
                                </a>
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">How to shop</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Contact us</a></li>
                                    <li><a onclick="return confirm('Sure to logout?')" href="logout_customer.php">Logout</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Terms and conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Account Setting</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a onclick="return confirm('Sure to logout?')" href="logout_customer.php">Sign Out</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © <?php echo date("Y"); ?> <a href="index.php" class="text-primary">Binimoy.XYZ</a>, All Rights Reserved.</p><!-- End .footer-copyright -->
                    <figure class="footer-payments">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    </figure><!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
        
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>


    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="index.php">Shop Now</a>
                            </li>
                            <li>
                                <a href="dashboard.php">My Account</a>
                            </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                          <li><a href="#">Computer & Laptop</a></li>
                          <li><a href="#">Smart Phones</a></li>
                          <li><a href="#">Televisions</a></li>
                          <li><a href="#">Camera</a></li>
                          <li><a href="#">Lighting</a></li>
                          <li><a href="#">Cooking</a></li>
                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>
