<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

 ?>


  <!--Top Selling Shop cart data load-->
 <?php
   $current_datetime = date("Y-m-d");
   $db   = new Database();
   $sql  = "SELECT DISTINCT shop_id, shop_name, shop_image, shop_location FROM tb_order_product";
   $read_topselling_shop = $db->select($sql);
  ?>


   <!-- Read All Shop -->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_shop WHERE shop_verify_status = 1";
   $read_all_shop = $db->select($sql);
  ?>


  <!-- Read Latest Shop -->
 <?php
   $current_date = date("Y-m-d");
   $db   = new Database();
   $sql  = "SELECT * FROM tb_shop WHERE shop_added_date = '$current_date' AND shop_verify_status = 1";
   $read_latest_shop = $db->select($sql);
  ?>



<!-- Particular shop search data load -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_POST['search']))
    {
      $shop_type     = $_POST['shop_type'];
      $shop_location = $_POST['shop_location'];

      $sql  = "SELECT * FROM tb_shop WHERE shop_verify_status = 1 AND shop_type = '$shop_type' AND shop_location = '$shop_location'";
      $read_all_shop = $db->select($sql);

    }
   ?>

   <!-- View All Shop -->
   <?php
     if(isset($_POST['view_all']))
     {
       $db   = new Database();
       $sql  = "SELECT * FROM tb_shop WHERE shop_verify_status = 1";
       $read_all_shop = $db->select($sql);
     }
    ?>






<!DOCTYPE html>
<html lang="en">


<!-- molla/index-10.html  22 Nov 2019 09:58:04 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Binimy.XYZ - Home</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
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
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-10.css">
    <link rel="stylesheet" href="assets/css/demos/demo-10.css">

    <!-- Fontawsome(v-4.7.0) -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">


</head>

<body>
    <div class="page-wrapper">
        <header class="header header-14">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#"><i class="icon-phone"></i>Call: +880 1609-479393</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul class="menus">
                                    <li class="login py-3">
                                        <a href="login.php">Sign In</a> || <a href="registration.php">Sign Up</a>
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-auto col-lg-3 col-xl-3 col-xxl-2">
                            <button class="mobile-menu-toggler">
                                <span class="sr-only">Toggle mobile menu</span>
                                <i class="icon-bars"></i>
                            </button>
                            <a href="index.php" class="logo px-2">
                              <h4 class="d-inline"><img src="assets/nav_logo/1.png" width="35" class="d-inline mb-1"> <b style="font-family: 'Vollkorn', serif;"><span class="text-primary">Binimoy</span>.<span class="text-danger">X</span><span class="text-info">Y</span><span class="text-success">Z</span></b></h4>
                            </a>
                        </div><!-- End .col-xl-3 col-xxl-2 -->
                    
                        <div class="col col-lg-9 col-xl-9 col-xxl-10 header-middle-right">
                            <div class="row">
                                <div class="col-lg-8 col-xxl-4-5col d-none d-lg-block">
                                    <div style="background-color: #4A5F84; color: white;">
                                        <marquee direction="left"><b><span style="font-size: 20px;">WELCOME TO 'BINIMOY.XYZ'. WE ARE HAPPY, YOU ARE HERE. ENJOY SHIPPING, THANK YOU!</span></b></marquee>
                                    </div><!-- End .header-search -->
                                </div><!-- End .col-xxl-4-5col -->

                                <div class="col-lg-4 col-xxl-5col d-flex justify-content-end align-items-center">
                                    <div class="header-dropdown-link">
                                        <div class="dropdown compare-dropdown px-4">
                                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                                <i class="icon-random"></i>
                                                <span class="compare-txt">Compare</span>
                                            </a>
                                        </div><!-- End .compare-dropdown -->  
                                    </div>
                                </div><!-- End .col-xxl-5col -->
                            </div><!-- End .row -->
                        </div><!-- End .col-xl-9 col-xxl-10 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-auto col-lg-3 col-xl-3 col-xxl-2 header-left">
                            <div class="dropdown category-dropdown show is-on" data-visible="true">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                    Browse Categories
                                </a>

                                <div class="dropdown-menu show">
                                    <nav class="side-nav">
                                        <ul class="menu-vertical sf-arrows">
                                            <li class="megamenu-container">
                                                <a href="#"><i class="icon-arrow-right"></i>Electronics</a>
                                            </li>
                                            <li><a href="#"><i class="icon-arrow-right"></i>Crockeries</a></li>
                                            <li><a href="#"><i class="icon-arrow-right"></i>Shoes</a></li>
                                            <li class="megamenu-container">
                                                <a href="#"><i class="icon-arrow-right"></i>Cloths</a>
                                            </li>
                                            <li class="megamenu-container">
                                                <a href="#"><i class="icon-arrow-right"></i>Computer and Mobile Accessories</a>
                                            </li>
                                            <li class="megamenu-container">
                                                <a href="#"><i class="icon-arrow-right"></i>Cosmetics</a>
                                            </li>
                                            <li class="megamenu-container">
                                                <a href="#"><i class="icon-arrow-right"></i>Furniture</a>
                                            </li>
                                            <li class="megamenu-container">
                                                <a href="#"><i class="icon-arrow-right"></i>Watch</a>
                                            </li>
                                        </ul><!-- End .menu-vertical -->
                                    </nav><!-- End .side-nav -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .category-dropdown -->
                        </div><!-- End .col-xl-3 col-xxl-2 -->

                        <div class="col col-lg-6 col-xl-6 col-xxl-8 header-center">
                            <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#all_shop" class="scroll-to">Shop Now</a>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Shop</a>

                                    <ul>
                                        <li>
                                            <a href="#all_shop" class="scroll-to">All Shop</a>
                                        </li>
                                        <li>
                                            <a href="#top_selling_shop" class="scroll-to">Top Selling Shop</a>
                                        </li>
                                        <li>
                                            <a href="#new_shop" class="scroll-to">New Shop</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>

                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                        </div><!-- End .col-xl-9 col-xxl-10 -->

                        <div class="col col-lg-3 col-xl-3 col-xxl-2 header-right">
                            <p>Welcome to Binimoy.XYZ</p>
                        </div>
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        <main class="main">
            <div class="mb-lg-2"></div><!-- End .mb-lg-2 -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 col-xxl-8 offset-lg-3 offset-xxl-2">
                        <div class="intro-slider-container slider-container-ratio mb-2">
                            <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                                    "nav": false, 
                                    "dots": true
                                }'>
                                <div class="intro-slide">
                                    <figure class="slide-image">
                                        <picture>
                                            <source media="(max-width: 480px)" srcset="assets/images/demos/demo-14/slider/slide-1-480w.jpg">
                                            <img src="assets/images/demos/demo-14/slider/slide-1.jpg" alt="Image Desc">
                                        </picture>
                                    </figure><!-- End .slide-image -->

                                    <div class="intro-content">
                                        <h3 class="intro-subtitle">New Arrivals</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title text-white">
                                            The New Way <br>To Buy Furniture
                                        </h1><!-- End .intro-title -->

                                        <a href="#all_shop" class="scroll-to btn btn-primary">
                                            <span>Shop Now</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .intro-content -->
                                </div><!-- End .intro-slide -->

                                <div class="intro-slide">
                                    <figure class="slide-image">
                                        <picture>
                                            <source media="(max-width: 480px)" srcset="assets/images/demos/demo-14/slider/slide-2-480w.jpg">
                                            <img src="assets/images/demos/demo-14/slider/slide-2.jpg" alt="Image Desc">
                                        </picture>
                                    </figure><!-- End .slide-image -->

                                    <div class="intro-content">
                                        <h3 class="intro-subtitle">Hottest Deals</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">
                                            <span>Wherever You Go</span> <br>DJI Mavic 2 Pro
                                        </h1><!-- End .intro-title -->

                                        <a href="#all_shop" class="scroll-to btn btn-primary">
                                            <span>Shop Now</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .intro-content -->
                                </div><!-- End .intro-slide -->

                                <div class="intro-slide">
                                    <figure class="slide-image">
                                        <picture>
                                            <source media="(max-width: 480px)" srcset="assets/images/demos/demo-14/slider/slide-3-480w.jpg">
                                            <img src="assets/images/demos/demo-14/slider/slide-3.jpg" alt="Image Desc">
                                        </picture>
                                    </figure><!-- End .slide-image -->

                                    <div class="intro-content">
                                        <h3 class="intro-subtitle">Limited Quantities</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">
                                            Refresh Your <br>Wardrobe
                                        </h1><!-- End .intro-title -->

                                        <a href="#all_shop" class="scroll-to btn btn-primary">
                                            <span>Shop Now</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .intro-content -->
                                </div><!-- End .intro-slide -->
                            </div><!-- End .intro-slider owl-carousel owl-simple -->
                            
                            <span class="slider-loader"></span><!-- End .slider-loader -->
                        </div><!-- End .intro-slider-container -->
                    </div><!-- End .col-xl-9 col-xxl-10 -->
                    
                    <div class="col-xl-3 col-xxl-2 d-none d-xxl-block">
                        <div class="banner banner-overlay  banner-content-stretch ">
                            <a href="#">
                                <img src="assets/images/demos/demo-14/banners/banner-1.png" alt="Banner img desc">
                            </a>
                            <div class="banner-content text-right">
                                <div class="price text-center">
                                    <sup class="text-white">from</sup>
                                    <span class="text-white">
                                        <strong>$199</strong><sup class="text-white">,99</sup>
                                    </span>
                                </div>
                                <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner banner-overlay -->
                    </div><!-- End .col-xl-3 col-xxl-2 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->

            <div class="bg-light pt-5 pb-10 mb-3" id="top_selling_shop">
                <div class="container">
                    <div class="heading heading-center mb-3">
                        <h2 class="title-lg">Top Selling Shop</h2><!-- End .title -->

                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                            </li>
                        </ul>
                    </div><!-- End .heading -->

                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane tab-pane-shadow p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                            <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 0,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
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
                                            "nav": true
                                        }
                                    }
                                }'>

                                <?php if($read_topselling_shop){ ?>
                                <?php while($result = $read_topselling_shop->fetch_assoc()){ ?>

                                <div class="product product-3 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-primary">Top Sale</span>
                                        <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>">
                                                <img src="<?php echo "Shop_Owner_Panel/pages/".$result['shop_image']; ?>" alt="shop_image" class="product-image">
                                            </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            Binimoy.XYZ
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>"><?php echo $result['shop_name']; ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $result['shop_location']; ?></span>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->

                                    <div class="product-footer">
                                        <div class="ratings-container">

                                                <!-- Total Review count -->
                                                 <?php
                                                     $shop_id = $result['shop_id'];
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
                                                       $shop_id = $result['shop_id'];
                                                       $db   = new Database();
                                                       $sql  = "SELECT sum(rating_value)rating_value FROM tb_shop_review WHERE shop_id = $shop_id";
                                                       $sum_of_rating_value = $db->select($sql);

                                                       while($getData = $sum_of_rating_value->fetch_assoc())
                                                       {
                                                         $total_rating = $getData['rating_value'];
                                                       }
                                                    ?>

                                                        <!-- Average rating value count -->
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



                                                        <!-- Put rating strat -->
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

                                                <span class="ratings-text">( <?php echo $total_review; ?> Reviews )</span>
                                            </div><!-- End .rating-container -->

                                        <div class="product-action">
                                            <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>" class="btn-product btn-cart"><span>Shop Now</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-footer -->
                                </div><!-- End .product -->

                                <?php } ?>
                                <?php }else{ ?>
                                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Shop Found!</div><br />';
                                    echo $msg; ?>
                                <?php } ?>

                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .container -->
            </div><!-- End .bg-light -->


            <div class="mb-4" id="all_shop"></div><!-- End .mb-4 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg mb-2">All Shop</h2><!-- End .title-lg text-center -->

                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                        </li>
                    </ul>

                    <div class="col-12 m-auto shadow" style="border-radius: 5px;">

                        <p class="pt-3 text-success">[ Search Shop Here . . . ]</p>
                    
                        <form class="px-4 py-4" action="" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-row">
                            <div class="form-group col-5">
                              <label for="shop_type">Select Shop Type *</label>
                              <select class="form-control" name="shop_type" required>
                                <option selected></option>
                                <option>Electronics</option>
                                <option>Crockeries</option>
                                <option>Shoes</option>
                                <option>Cloths</option>
                                <option>Computer and Mobile Accessories</option>
                                <option>Cosmetics</option>
                                <option>Furniture</option>
                                <option>Watch</option>
                              </select>
                            </div>
                            <div class="form-group col-5">
                              <label for="shop_location">Select Shop Location *</label>
                              <select class="form-control" name="shop_location" required>
                                <option selected></option>
                                <option>New Market</option>
                                <option>Agrabad</option>
                                <option>JEC</option>
                                <option>2 No Gate</option>
                                <option>Muradpur</option>
                                <option>Boddarhat</option>
                                <option>Chawkbazar</option>
                                <option>Zamal Khan</option>
                                <option>Lalkhan Bazar</option>
                                <option>Halisahar</option>
                                <option>Karnafuli</option>
                                <option>Kotwali</option>
                                <option>Khulshi</option>
                                <option>Panchlaish</option>
                                <option>Pahartali</option>
                                <option>Bakalia</option>
                                <option>Bayejid</option>
                                <option>Anowara</option>
                                <option>Chandanaish</option>
                                <option>Patiya</option>
                                <option>Fatikchhari</option>
                                <option>Banskhali</option>
                                <option>Boalkhali</option>
                                <option>Mirsharai</option>
                                <option>Raozan</option>
                                <option>Rangunia</option>
                                <option>Lohagara</option>
                                <option>Sandwip</option>
                                <option>Satkania</option>
                                <option>Sitakunda</option>
                                <option>Hatazari</option>
                              </select>
                            </div>
                            <div class="form-group col-2">
                              <input type="submit" class="btn" style="background-color: #333333; color: white; margin-top: 36px;" class="form-control" name="search" value="Search">
                            </div>
                        </div>
                        
                    </form>

                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-row">
                            <div class="form-group col-12">
                              <input type="submit" class="btn" style="background-color: #333333; color: white;" class="form-control" name="view_all" value="View All">
                            </div>
                        </div>
                    </form>

                </div>
                </div><!-- End .heading -->

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                        <div class="products just-action-icons-sm">
                            <div class="row">

                                <?php if($read_all_shop){ ?>
                                <?php while($result = $read_all_shop->fetch_assoc()){ ?>

                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product product-3 text-center">
                                        <figure class="product-media">
                                            <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>">
                                                <img src="<?php echo "Shop_Owner_Panel/pages/".$result['shop_image']; ?>" alt="shop_image" class="product-image">
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                Binimoy.XYZ
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>"><?php echo $result['shop_name']; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $result['shop_location']; ?></span>
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->

                                        <div class="product-footer">
                                            <div class="ratings-container">

                                                <!-- Total Review count -->
                                                 <?php
                                                     $shop_id = $result['shop_id'];
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
                                                       $shop_id = $result['shop_id'];
                                                       $db   = new Database();
                                                       $sql  = "SELECT sum(rating_value)rating_value FROM tb_shop_review WHERE shop_id = $shop_id";
                                                       $sum_of_rating_value = $db->select($sql);

                                                       while($getData = $sum_of_rating_value->fetch_assoc())
                                                       {
                                                         $total_rating = $getData['rating_value'];
                                                       }
                                                    ?>

                                                        <!-- Average rating value count -->
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



                                                        <!-- Put rating strat -->
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

                                                <span class="ratings-text">( <?php echo $total_review; ?> Reviews )</span>
                                            </div><!-- End .rating-container -->

                                            <div class="product-action">
                                                <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>" class="btn-product btn-cart" title="shop now"><span>Shop Now</span></a>
                                            </div><!-- End .product-action -->
                                        </div><!-- End .product-footer -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-6 col-md-4 col-lg-3 -->

                                <?php } ?>
                                <?php }else{ ?>
                                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Shop Found!</div><br />';
                                    echo $msg; ?>
                                <?php } ?>

                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- End .mb5 -->

            <div class="bg-light pt-5 pb-10 mb-3" id="new_shop">
                <div class="container">
                    <div class="heading heading-center mb-3">
                        <h2 class="title-lg">Latest Shop</h2><!-- End .title -->

                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                            </li>
                        </ul>
                    </div><!-- End .heading -->

                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane tab-pane-shadow p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                            <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 0,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
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
                                            "nav": true
                                        }
                                    }
                                }'>

                                <?php if($read_latest_shop){ ?>
                                <?php while($result = $read_latest_shop->fetch_assoc()){ ?>

                                <div class="product product-3 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-primary">New Shop</span>
                                        <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>">
                                                <img src="<?php echo "Shop_Owner_Panel/pages/".$result['shop_image']; ?>" alt="shop_image" class="product-image">
                                            </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            Binimoy.XYZ
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>"><?php echo $result['shop_name']; ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $result['shop_location']; ?></span>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->

                                    <div class="product-footer">
                                        <div class="ratings-container">

                                                <!-- Total Review count -->
                                                 <?php
                                                     $shop_id = $result['shop_id'];
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
                                                       $shop_id = $result['shop_id'];
                                                       $db   = new Database();
                                                       $sql  = "SELECT sum(rating_value)rating_value FROM tb_shop_review WHERE shop_id = $shop_id";
                                                       $sum_of_rating_value = $db->select($sql);

                                                       while($getData = $sum_of_rating_value->fetch_assoc())
                                                       {
                                                         $total_rating = $getData['rating_value'];
                                                       }
                                                    ?>

                                                        <!-- Average rating value count -->
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



                                                        <!-- Put rating strat -->
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

                                                <span class="ratings-text">( <?php echo $total_review; ?> Reviews )</span>
                                            </div><!-- End .rating-container -->

                                        <div class="product-action">
                                            <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>" class="btn-product btn-cart"><span>Shop Now</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-footer -->
                                </div><!-- End .product -->

                                <?php } ?>
                                <?php }else{ ?>
                                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Shop Found!</div><br />';
                                    echo $msg; ?>
                                <?php } ?>

                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .container -->
            </div><!-- End .bg-light -->

            <div class="blog-posts">
                <div class="container">
                    <h2 class="title-lg text-center mb-4">From Our Blog</h2><!-- End .title-lg text-center -->

                    <div class="owl-carousel owl-simple mb-4" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "520": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                }
                            }
                        }'>
                        <article class="entry">
                            <figure class="entry-media">
                                <a href="#">
                                    <img src="assets/images/shop/1.jpg" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">

                                <h3 class="entry-title">
                                    <a href="#">Computer</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>Phasellus hendrerit. Pellentesque aliquet nibh.</p> 
                                    <a href="#" class="read-more">READ MORE</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    
                        <article class="entry">
                            <figure class="entry-media">
                                <a href="#">
                                    <img src="assets/images/shop/2.jpg" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">

                                <h3 class="entry-title">
                                    <a href="#">Mobile</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra. </p>
                                    <a href="#" class="read-more">READ MORE</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <figure class="entry-media">
                                <a href="#">
                                    <img src="assets/images/shop/3.jpg" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">

                                <h3 class="entry-title">
                                    <a href="#">Furniture</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>Pellentesque aliquet nibh nec urna.</p>
                                    <a href="#" class="read-more">READ MORE</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <figure class="entry-media">
                                <a href="#">
                                    <img src="assets/images/shop/4.jpg" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">

                                <h3 class="entry-title">
                                    <a href="#">Watch</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>Sed egestas, ante et vulputate volutpat.MORE</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .owl-carousel -->

                    <div class="more-container text-center mt-1">
                        <a href="#" class="btn btn-outline-lightgray btn-more btn-round"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .more-container -->
                </div><!-- End .container -->
            </div><!-- End .blog-posts -->
        </main><!-- End .main -->

        <footer class="footer footer-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <a href="index.php" class="logo px-2">
                                  <h4 class="d-inline"><img src="assets/nav_logo/1.png" width="35" class="d-inline mb-1"> <b style="font-family: 'Vollkorn', serif;"><span class="text-primary">Binimoy</span><span class="text-light">.</span><span class="text-danger">X</span><span class="text-info">Y</span><span class="text-success">Z</span></b></h4>
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
                    <li class="active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Shop</a>

                                    <ul>
                                        <li>
                                            <a href="#all_shop">All Shop</a>
                                        </li>
                                        <li>
                                            <a href="#top_selling_shop">Top Selling Shop</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
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
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-10.js"></script>
</body>


<!-- molla/index-10.html  22 Nov 2019 09:58:22 GMT -->
</html>