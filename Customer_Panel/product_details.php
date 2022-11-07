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
       $product_image_2       = $getData['product_image_2'];
       $product_id            = $getData['product_id'];
       $product_name          = $getData['product_name'];
       $product_code          = $getData['product_code'];
       $product_price         = $getData['product_price'];
       $product_description   = $getData['product_description'];
       $product_type          = $getData['product_type'];
       $product_brand         = $getData['product_brand'];
       $fixed_price_or_not    = $getData['fixed_price_or_not'];
       $product_upload_date   = $getData['product_upload_date'];
       $shop_name             = $getData['shop_name'];
       $shop_location_details = $getData['shop_location_details'];

       $name            = $getData['name'];
       $email           = $getData['email'];
       $phone           = $getData['phone'];
       $address         = $getData['address'];
       $shop_owner      = $getData['shop_owner'];
     }
   }
  ?>


  <!--Related Bkash/Nagad Number from shop table-->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['product_id']))
   {

     $shop_id    = $_GET['shop_id'];
     $product_id = $_GET['product_id'];

     $sql  = "SELECT bkash_number, nagad_number FROM tb_shop WHERE shop_id = $shop_id";

     $result = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
       $bkash_number = $getData['bkash_number'];
       $nagad_number = $getData['nagad_number'];
     }
   }
  ?>



  <!--Related more product from seller data load-->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_product WHERE shop_owner = '$shop_owner'";
   $read_more_product = $db->select($sql);
  ?>






<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Binimoy.XYZ - Product Details</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">

    <!-- Fontawsome (Version: 4.7.0) -->
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
                            <a href="shop_details.php?shop_id=<?php echo $shop_id; ?>"><i class="icon icon-arrow-left"></i> Back to Shop</a>
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
                                    <a href="">Order Now</a>
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
                        <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="<?php echo "../Shop_Owner_Panel/pages/".$product_image_1; ?>" data-zoom-image="<?php echo "../Shop_Owner_Panel/pages/".$product_image_1; ?>" alt="product_image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="<?php echo "../Shop_Owner_Panel/pages/".$product_image_1; ?>" data-zoom-image="<?php echo "../Shop_Owner_Panel/pages/".$product_image_1; ?>">
                                                <img src="<?php echo "../Shop_Owner_Panel/pages/".$product_image_1; ?>" alt="product_image_2">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="<?php echo "../Shop_Owner_Panel/pages/".$product_image_2; ?>" data-zoom-image="<?php echo "../Shop_Owner_Panel/pages/".$product_image_2; ?>">
                                                <img src="<?php echo "../Shop_Owner_Panel/pages/".$product_image_2; ?>" alt="product_image_1">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title"><?php echo $product_name; ?></h1><!-- End .product-title -->

                                    <div class="product-price" style="font-size: 18px;">
                                        Price : <?php echo $product_price." Tk."; ?>
                                    </div>

                                    <div class="product-content">
                                        <p><?php echo $product_description; ?></p>
                                    </div><!-- End .product-content -->

                                    <div>
                                        <label>Product Type :</label>
                                        <label style="color: #CC9966;"><?php echo $product_type; ?></label>
                                    </div>

                                    <div>
                                        <label for="size">Product Brand :</label>
                                        <label style="color: #CC9966;"><?php echo $product_brand; ?></label>
                                    </div>

                                    <div>
                                        <label for="qty">Fixed Price :</label>
                                        <label style="color: #CC9966;"><?php echo $fixed_price_or_not; ?></label>
                                    </div>

                                    <div>
                                        <label for="qty">Shop Name :</label>
                                        <label style="color: #CC9966;"><?php echo $shop_name; ?></label>
                                    </div>

                                    <div>
                                        <label for="qty">Shop Location : <span style="color: #CC9966;"><?php echo $shop_location_details; ?></span></label>
                                    </div>

                                    <div>
                                        <label for="qty">Contact Us :</label>
                                        <label style="color: #CC9966;"><?php echo $phone; ?></label>
                                    </div>

                                    <div class="product-details-action">
                                        <a href="order_product.php?product_id=<?php echo $product_id; ?>&shop_id=<?php echo $shop_id; ?>" class="btn-product btn-cart mb-2 mt-2"><span>add to cart</span></a>

                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Product posted on: <?php echo $product_upload_date; ?></span>
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="saller-desc-link" data-toggle="tab" href="#saller-desc-tab" role="tab" aria-controls="saller-desc-tab" aria-selected="true">Seller Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="payment-info-link" data-toggle="tab" href="#payment-info-tab" role="tab" aria-controls="payment-info-tab" aria-selected="false">Payment Information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="saller-desc-tab" role="tabpanel" aria-labelledby="saller-desc-link">
                                <div class="product-desc-content">
                                    <h3>Seller Information</h3>
                                    <p class="mb-1"><i class="fa fa-user-circle-o fa-fw"></i> <?php echo $name; ?> </p>
                                    <p class="mb-1"><i class="fa fa-envelope fa-fw"></i> <?php echo $email; ?> </p>
                                    <p class="mb-1"><i class="fa fa-phone fa-fw"></i> <?php echo $phone; ?> </p>

                                    <br>

                                    <h3><u>Contact Us for your product</u></h3>
                                    <p class="mb-1"><i class="fa fa-phone fa-fw"></i> <?php echo $phone; ?> </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="payment-info-tab" role="tabpanel" aria-labelledby="payment-info-link">
                                <div class="product-desc-content">
                                    <h3>Payment Information</h3>
                                    <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> You have to pay at least Tk. 100 advance to confirm your order.</p>
                                    <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> Save your payment history for future evidence.</p>
                                    <p class="mb-3"><i class="fa fa-hand-o-right" aria-hidden="true"></i> You can pay by Bkash or Nagad, which has been given below.</p>
                                    <div class="row">
                                        <div class="col-lg-4 mr-0 pr-0">
                                          <p><img src="payment_icon/bkash.svg" width="120"> <b>Merchant Number : <?php echo $bkash_number; ?></b></p>
                                        </div>
                                        <div class="col-lg-4 ml-0 pl-0">
                                         <p><img src="payment_icon/nagad.png" width="120"> <b>Merchant Number : <?php echo $nagad_number; ?></b></p>
                                        </div>
                                    </div>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">More Product from Seller</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        
                        <?php if($read_more_product){ ?>
                        <?php while($result = $read_more_product->fetch_assoc()){ ?>
                        <div class="product product-7 text-center shadow">
                            <figure class="product-media">
                                <a href="product_details.php?product_id=<?php echo $result['product_id']; ?>&shop_id=<?php echo $shop_id; ?>">
                                    <img src="<?php echo "../Shop_Owner_Panel/pages/".$result['product_image_1']; ?>" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="product_details.php?product_id=<?php echo $result['product_id']; ?>&shop_id=<?php echo $shop_id; ?>" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat mb-1">
                                    Type : <?php echo $result['product_type']; ?>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title mb-1 font-weight-bold"><a href="product_details.php?product_id=<?php echo $result['product_id']; ?>&shop_id=<?php echo $shop_id; ?>"><?php echo $result['product_name']; ?></a></h3><!-- End .product-title -->
                                <div class="product-price mb-1">
                                    <small class="new-price">Price : <?php echo $result['product_price']; ?> Tk.</small>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        <?php } ?>
                        <?php }else{ ?>
                        <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Product Found!</div><br />';
                            echo $msg; ?>
                        <?php } ?>

                    </div><!-- End .owl-carousel -->
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
    <button style="border-radius: 5px;" id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

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

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="">Order Now</a>
                    </li>
                    <li>
                        <a href="dashboard.php">My Account</a>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

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
