<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../login.php');
  }
 ?>


 <!-- Select shop data -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['shop_id']))
   {

     $shop_id = $_GET['shop_id'];

     $sql     = "SELECT * FROM tb_shop WHERE shop_id = $shop_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
       $name                  = $getData['name'];
       $phone                 = $getData['phone'];
       $email                 = $getData['email'];
       $shop_id               = $getData['shop_id'];
       $shop_code             = $getData['shop_code'];
       $shop_name             = $getData['shop_name'];
       $shop_location_details = $getData['shop_location_details'];
       $shop_location         = $getData['shop_location'];
       $shop_image            = $getData['shop_image'];
     }
   }
  ?>




  <!-- Add product section -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {

         $name                  = $_POST['name'];
         $email                 = $_POST['email'];
         $phone                 = $_POST['phone'];
         $shop_id               = $_POST['shop_id'];
         $shop_code             = $_POST['shop_code'];
         $shop_name             = $_POST['shop_name'];
         $shop_location         = $shop_location;
         $shop_location_details = $_POST['shop_location_details'];
         $shop_image            = $shop_image;
         $product_name          = $_POST['product_name'];
         $product_type          = $_POST['product_type'];
         $product_price         = $_POST['product_price'];
         $product_description   = $_POST['product_description'];
         $product_brand         = $_POST['product_brand'];
         $fixed_price_or_not    = $_POST['fixed_price_or_not'];
         $product_upload_date   = $_POST['product_upload_date'];
         $product_code          = rand(100000, 999999);
         $shop_owner            = $user_name;
       

         $tmp_1         = md5(time());
         $product_image_1 = $_FILES["product_image_1"]["name"];
         $dst_1         = "./product_images/".$tmp_1.$product_image_1;
         $dst_db_1      = "product_images/".$tmp_1.$product_image_1;
         move_uploaded_file($_FILES["product_image_1"]["tmp_name"],$dst_1);

         $tmp_2         = md5(time());
         $product_image_2 = $_FILES["product_image_2"]["name"];
         $dst_2         = "./product_images/".$tmp_2.$product_image_2;
         $dst_db_2      = "product_images/".$tmp_2.$product_image_2;
         move_uploaded_file($_FILES["product_image_2"]["tmp_name"],$dst_2);


         $sql = "INSERT INTO tb_product(name,email,phone,shop_id,shop_code,shop_name,shop_location,shop_location_details,shop_image,product_name,product_code,product_type,product_price,product_image_1,product_image_2,product_description,product_brand,fixed_price_or_not,product_upload_date,shop_owner,entry_time)values('$name','$email','$phone','$shop_id','$shop_code','$shop_name','$shop_location','$shop_location_details','$shop_image','$product_name','$product_code','$product_type','$product_price','$dst_db_1','$dst_db_2','$product_description','$product_brand','$fixed_price_or_not','$product_upload_date','$shop_owner','$current_datetime')";
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
           ?>

           <script type="text/javascript">
             window.alert("Product added successfully.");
             window.location='add_product.php?shop_id=<?php echo $shop_id; ?>';
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
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Binimoy.XYZ | Add product</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Fontawsome(v-4.7.0) -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link ml-2">
      <h5><i class="pt-4 fa fa-handshake-o fa-fw d-inline text-warning" aria-hidden="true"></i> <b style="font-weight: bold; color: white; font-family: cursive;">Binimoy.XYZ</b></h5>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><i class="fa fa-user"></i> Owner : <b><?php echo $_SESSION['user_name']; ?></b></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="add_shop.php" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Add Shop
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="manage_shop.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Manage Shop
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="shop_payment_history.php" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Shop Payment History
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="shop_list.php" class="nav-link active">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
                Add Product
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="customer_order.php" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Customer Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="order_payment_history.php" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Order Payment History
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="shop_review.php" class="nav-link">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Shop Review
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a onclick="return confirm('Sure to logout?')" href="logout_owner.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sign-Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">

                  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                      <div class="form-row">
                        <div class="form-group col-lg-4">
                          <label for="email">Your Name *</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter Full Name"  name="name" value="<?php echo $name; ?>" readonly>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="phone">Phone *</label>
                          <input type="number" id="phone" class="form-control" placeholder="Your Phone Number" name="phone" value="<?php echo $phone; ?>" readonly>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="email">Email *</label>
                          <input type="email" id="email" class="form-control" placeholder="Your Email Address" name="email" value="<?php echo $email; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-4">
                          <label for="shop_id">Shop Id *</label>
                          <input type="text" id="shop_id" class="form-control" placeholder="Enter Shop Id"  name="shop_id" value="<?php echo $shop_id; ?>" readonly>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="shop_no">Shop Code *</label>
                          <input type="text" class="form-control" id="shop_code" name="shop_code" placeholder="Enter Shop Code" value="<?php echo $shop_code; ?>" readonly>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="shop_type">Shop Name *</label>
                          <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Enter Shop Name." value="<?php echo $shop_name; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                          <label for="shop_location_details">Shop Address *</label>
                          <textarea rows="3" class="form-control" id="shop_location_details" name="shop_location_details" placeholder="Enter Shop Location Details" readonly><?php echo $shop_location_details; ?></textarea>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-6">
                          <label for="product_name">Product Title *</label>
                          <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product Name"  name="product_name" required>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="product_type">Product Category *</label>
                          <select class="form-control" name="product_type" required>
                            <option selected="">Select one...</option>
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
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-4">
                          <label for="product_price">Product Price *</label>
                          <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Enter product Price" required>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="product_image_1">Product Image_1 *</label>
                          <input type="file" class="form-control" id="product_image_1" name="product_image_1" required>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="product_image_2">Product Image_2 *</label>
                          <input type="file" class="form-control" id="product_image_2" name="product_image_2" required>
                        </div>
                      </div>

                      <div class="form-group">
                          <label for="shop_location_details">Product Description *</label>
                          <textarea rows="3" class="form-control" id="product_description" name="product_description" placeholder="Enter Product Description" required></textarea>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-4">
                          <label for="product_brand">Product Brand (If Any) </label>
                          <input type="text" class="form-control" id="product_brand" name="product_brand" placeholder="Enter Product Brand Name (If Any)">
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="fixed_price_or_not">Fixed Price *</label>
                            <select class="form-control" id="fixed_price_or_not" name="fixed_price_or_not" required>
                              <option selected>Choose...</option>
                              <option>Yes</option>
                              <option>No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="product_upload_date">Product Upload Date *</label>
                            <input type="date" class="form-control" id="product_upload_date" name="product_upload_date" required>
                          </div>
                      </div>

                      <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Add Product">
                      </div>

                    </form>

                </div>
                <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="../index.php">Binimoy.XYZ</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <a href="../index.php"><i class="fas fa-home"></i> Home</a>
    </div>
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
