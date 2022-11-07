<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

 ?>


<!-- Select particular shop details -->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['shop_id']))
   {

     $shop_id = $_GET['shop_id'];

     $sql = "SELECT * FROM tb_shop WHERE shop_id = $shop_id";

     $result = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
       $shop_image            = $getData['shop_image'];
       $shop_id               = $getData['shop_id'];
       $shop_type             = $getData['shop_type'];
       $shop_name             = $getData['shop_name'];
       $about_shop            = $getData['about_shop'];
       $shop_location_details = $getData['shop_location_details'];
       $shop_contact          = $getData['shop_contact'];
       $shop_added_date       = $getData['shop_added_date'];
       $shop_oc_time          = $getData['shop_oc_time'];
       $name                  = $getData['name'];
       $email                 = $getData['email'];
       $phone                 = $getData['phone'];
       $shop_owner            = $getData['shop_owner'];
     }
   }
  ?>



  <!--Available product data load-->
 <?php
   $shop_id = $_GET['shop_id'];

   $db   = new Database();
   $sql  = "SELECT * FROM tb_product WHERE shop_id = $shop_id";
   $read_product = $db->select($sql);
  ?>



  <!-- Search medicine data load -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_POST['search']))
    {

      $product_name = $_POST['product_name'];
      $product_type = $_POST['product_type'];

      $sql  = "SELECT * FROM tb_product WHERE shop_id = '$shop_id' AND product_name = '$product_name' AND product_type = '$product_type'";
      $read_product = $db->select($sql);

    }
   ?>

   <!-- View All Medicine -->
   <?php
     if(isset($_POST['view_all']))
     {
       $db   = new Database();
       $sql  = "SELECT * FROM tb_product WHERE shop_id = $shop_id";
       $read_product = $db->select($sql);
     }
    ?>



  <!--Shop Review load-->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_shop_review WHERE shop_id = $shop_id AND shop_owner = '$shop_owner'";
   $read_shop_review = $db->select($sql);
  ?>



  <!-- Total Review count -->
 <?php
     $db   = new Database();
     $sql  = "SELECT * FROM tb_shop_review WHERE shop_id = $shop_id";
     $read_total_review = $db->select($sql);
     if($read_total_review)
     {
       $total_review = $read_total_review->num_rows;
     }
     else
     {
       $total_review = 0;
     }
    ?>


    <!-- Total rating value count -->
<?php
   $db   = new Database();
   $sql  = "SELECT sum(rating_value)rating_value FROM tb_shop_review WHERE shop_id = $shop_id";
   $sum_of_rating_value = $db->select($sql);

   while($getData = $sum_of_rating_value->fetch_assoc())
   {
     $total_rating = $getData['rating_value'];
   }
?>


<?php 
  
  error_reporting( error_reporting() & ~E_NOTICE );
  if ($total_rating == 0 AND $total_review == 0) 
  {
    $avg_rating = 0;
  }
  else
  {
    $avg_rating = (int) ($total_rating/$total_review);
  }

 ?>









<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Binimoy.XYZ - Shop Details</title>
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
                            <a href="index.php"><i class="icon icon-arrow-left"></i> Back to Home</a>
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
                                    <a href="#available_product" class="scroll-to">Buy Product</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                          <a href="login.php" class="px-2">Sign In</a> || <a href="registration.php" class="px-2">Sign Up</a>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop Details</li>
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
                                            <img id="product-zoom" src="<?php echo "Shop_Owner_Panel/pages/".$shop_image; ?>" data-zoom-image="<?php echo "Shop_Owner_Panel/pages/".$shop_image; ?>" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="<?php echo "Shop_Owner_Panel/pages/".$shop_image; ?>" data-zoom-image="<?php echo "Shop_Owner_Panel/pages/".$shop_image; ?>">
                                                <img src="<?php echo "Shop_Owner_Panel/pages/".$shop_image; ?>" alt="shop_image">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title"><?php echo $shop_name; ?></h1><!-- End .product-title -->

                                    <div class="ratings-container">

                                      <?php 

                                        if($avg_rating == 0)
                                        {
                                          ?>

                                            <i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                          <?php
                                        }
                                        else if($avg_rating == 1)
                                        {
                                          ?>

                                            <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                          <?php
                                        }
                                        else if($avg_rating == 2)
                                        {
                                            ?>

                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                            <?php
                                        }
                                        else if($avg_rating == 3)
                                        {
                                            ?>

                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                            <?php
                                        }
                                        else if($avg_rating == 4)
                                        {
                                            ?>

                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                            <?php
                                        }
                                        else if($avg_rating >= 5)
                                        {
                                            ?>

                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i>

                                            <?php
                                        }

                                       ?>
                                        
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( <?php echo $total_review; ?> Review )</a>
                                    </div><!-- End .rating-container -->


                                    <div class="product-content">
                                        <p><?php echo $about_shop; ?></p>
                                    </div><!-- End .product-content -->

                                    <div>
                                        <label for="qty">Shop Type : <span style="color: #CC9966;"><?php echo $shop_type; ?></span></label>
                                    </div>

                                    <div>
                                        <label for="qty">Shop Location : <span style="color: #CC9966;"><?php echo $shop_location_details; ?></span></label>
                                    </div>

                                    <div>
                                        <label for="qty">Shop (Opening - Closing) Time : <span style="color: #CC9966;"><?php echo $shop_oc_time; ?></span></label>
                                    </div>

                                    <div>
                                        <label for="qty">Contact Us : <span style="color: #CC9966;"><?php echo $shop_contact; ?></span></label>
                                    </div>

                                    <div class="product-details-action">
                                        <a href="#available_product" class="scroll-to btn-product btn-cart mb-2 mt-2"><span>Buy Product</span></a>

                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Shop added on : <?php echo $shop_added_date; ?></span>
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
                                <a class="nav-link active" id="saller-desc-link" data-toggle="tab" href="#saller-desc-tab" role="tab" aria-controls="saller-desc-tab" aria-selected="true">Shop Owner Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Shop Reviews (<?php echo $total_review; ?>)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="saller-desc-tab" role="tabpanel" aria-labelledby="saller-desc-link">
                                <div class="product-desc-content">
                                    <h3><u>Shop Owner Info</u></h3>
                                    <a href="login.php">Login to View</a>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Shop Reviews (<?php echo $total_review; ?>)</h3>

                                    <?php if($read_shop_review){ $i = 0; ?>
                                    <?php while($result = $read_shop_review->fetch_assoc()){ $i = $i + 1; ?>
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#"><?php echo $result['reviewed_by']; ?></a></h4>
                                                <div class="ratings-container">
                                                    <?php
                                                      $rating_value = $result['rating_value'];

                                                        if($rating_value == 1)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 2)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 3)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 4)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 5)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i>

                                                            <?php
                                                        }
                                                     ?>
                                                </div><!-- End .rating-container -->
                                                <span class="review-date"><?php echo $result['entry_time']; ?></span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4><?php
                                                      $rating_value = $result['rating_value'];

                                                        if($rating_value == 1)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-danger">Awful</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 2)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-warning " style="color: white;">Poor</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 3)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-secondary">Average</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 4)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-info">Good</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 5)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-success">Excellent</div><br />';
                                                             echo $msg;
                                                        }
                                                     ?></h4>

                                                <div class="review-content">
                                                    <p><?php echo $result['comment']; ?></p>
                                                </div><!-- End .review-content -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Review Found!</div><br />';
                                      echo $msg; ?>
                                    <?php } ?>

                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <hr>
                    <h2 class="title text-center mb-4" id="available_product">Available Product</h2><!-- End .title text-center -->


                    <div class="container">

                      <div class="col-12 m-auto shadow" style="border-radius: 5px;">

                        <p class="pt-3 text-center text-success">[ Search Product Here . . . ]</p>
                    
                        <form class="px-4 py-4" action="" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-row">
                            <div class="form-group col-5">
                              <label for="product_name">Product Name *</label>
                              <input type="text" class="form-control" name="product_name" placeholder="Enter product name" required="">
                            </div>
                            <div class="form-group col-5">
                              <label for="product_type">Product Type *</label>
                              <select class="form-control" name="product_type" required>
                                <option selected>Select product type</option>
                                <option>Electronics</option>
                                <option>Crockeries</option>
                                <option>Shoe</option>
                                <option>Cloths</option>
                                <option>Computer and Mobile</option>
                                <option>Computer and Mobile Accessories</option>
                                <option>Cosmetics</option>
                                <option>Furniture</option>
                                <option>Watch</option>
                              </select>
                            </div>
                            <div class="form-group col-2">
                              <input type="submit" class="btn" style="background-color: #333333; color: white; margin-top: 36px;" class="form-control" name="search" value="Search">
                            </div>
                        </div>
                        
                    </form>

                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-row text-center">
                            <div class="form-group col-12">
                              <input type="submit" class="btn" style="background-color: #333333; color: white;" class="form-control" name="view_all" value="View All">
                            </div>
                        </div>
                    </form>

                </div>


                    <div class="heading heading-center">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                            </li>
                        </ul>
                    </div><!-- End .heading -->

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                        <div class="products just-action-icons-sm">
                            <div class="row">

                                <?php if($read_product){ ?>
                                <?php while($result = $read_product->fetch_assoc()){ ?>

                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col shadow">
                                    <div class="product product-3 text-center">
                                        <figure class="product-media mt-1">
                                            <a href="product_details.php?product_id=<?php echo $result['product_id']; ?>&shop_id=<?php echo $shop_id; ?>">
                                                <img src="<?php echo "Shop_Owner_Panel/pages/".$result['product_image_1']; ?>" alt="product_image" class="product-image">
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat mb-1">
                                                Type : <?php echo $result['product_type']; ?>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title mb-1 font-weight-bold"><a href="product_details.php?product_id=<?php echo $result['product_id']; ?>&shop_id=<?php echo $shop_id; ?>"><?php echo $result['product_name']; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price mb-2">
                                                <small class="new-price">Price : <?php echo $result['product_price']; ?> Tk.</small>
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-6 col-md-4 col-lg-3 -->

                                <?php } ?>
                                <?php }else{ ?>
                                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Product Found!</div><br />';
                                    echo $msg; ?>
                                <?php } ?>

                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

                    
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
                                  <h4 class="d-inline"><img src="assets/nav_logo/1.png" width="35" class="d-inline mb-1"> <b style="font-family: 'Vollkorn', serif;"><span style="color: #4A5F84;">Binimoy</span><span class="text-light">.</span><span class="text-danger">X</span><span class="text-info">Y</span><span class="text-success">Z</span></b></h4>
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
                                    <li><a href="login.php">Login</a></li>
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
                                    <li><a href="login.php">Sign In</a></li>
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
                    <li class="megamenu-container active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#available_product">Buy Product</a>
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
