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
       $shop_id               = $getData['shop_id'];
       $shop_code             = $getData['shop_code'];
       $shop_name             = $getData['shop_name'];
       $shop_location_details = $getData['shop_location_details'];
     }
   }
  ?>



  <!-- Add product payment section -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {

         $name                  = $_POST['name'];
         $phone                 = $_POST['phone'];
         $shop_id               = $_POST['shop_id'];
         $shop_code             = $_POST['shop_code'];
         $shop_name             = $_POST['shop_name'];
         $shop_location_details = $_POST['shop_location_details'];
         $paid_amount           = $_POST['paid_amount'];
         $trx_id                = $_POST['trx_id'];
         $paid_by               = $_POST['paid_by'];
         $payment_date          = $_POST['payment_date'];
         $owner_user_name       = $user_name;
         $payment_code          = rand(100000, 999999);

         $tmp        = md5(time());
         $payment_ss = $_FILES["payment_ss"]["name"];
         $dst        = "./payment_screenshot_images/".$tmp.$payment_ss;
         $dst_db     = "payment_screenshot_images/".$tmp.$payment_ss;
         move_uploaded_file($_FILES["payment_ss"]["tmp_name"],$dst);

         $sql = "INSERT INTO tb_shop_payment(name,phone,shop_id,shop_code,shop_name,shop_location_details,paid_amount,trx_id,payment_ss,paid_by,payment_date,payment_code,owner_user_name,entry_time)values('$name','$phone','$shop_id','$shop_code','$shop_name','$shop_location_details','$paid_amount','$trx_id','$dst_db','$paid_by','$payment_date','$payment_code','$owner_user_name','$current_datetime')";
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
           ?>

           <script type="text/javascript">
             window.alert("Shop payment submitted successfully.");
             window.location='manage_shop.php';
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
  <title>Binimoy.XYZ | Shop Payment</title>

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
            <a href="manage_shop.php" class="nav-link active">
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
            <a href="shop_list.php" class="nav-link">
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
            <h1>Shop Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Shop Payment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Payment Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">

                  <form class="" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="<?php echo $name; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Your Phone Number" value="<?php echo $phone; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="shop_id">Shop Id *</label>
                        <input type="text" id="shop_id" name="shop_id" class="form-control" placeholder="Enter shop Id" value="<?php echo $shop_id; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="shop_code">Shop Code *</label>
                        <input type="text" id="shop_code" name="shop_code" class="form-control" placeholder="Enter Shop Code" value="<?php echo $shop_code; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="shop_name">Shop Name *</label>
                        <input type="shop_name" id="shop_name" name="shop_name" class="form-control" placeholder="Enter Shop Name" value="<?php echo $shop_name; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="shop_location_details">Shop Location Details *</label>
                        <textarea rows="3" class="form-control" id="shop_location_details" name="shop_location_details" placeholder="Enter Shop Location Details" required><?php echo $shop_location_details; ?></textarea>
                        </div>
                      <div class="form-group">
                        <label for="amount">Paid Amount *</label>
                        <input type="number" id="amount" name="paid_amount" class="form-control" placeholder="Enter Amount" required>
                      </div>
                      <div class="form-group">
                        <label for="trx_id">TrxID *</label>
                        <input type="text" id="trx_id" name="trx_id" class="form-control" placeholder="Enter TrxID" required>
                      </div>
                      <div class="form-group">
                        <label for="payment_ss">Payment Screenshot *</label>
                        <input type="file" id="payment_ss" name="payment_ss" class="form-control" required>
                      </div>
                      <div class="form-group">
              <label for="paid_by">Paid By *</label>
              <select class="form-control" id="paid_by" name="paid_by" required>
                <option selected>Choose...</option>
                <option>Bkash</option>
                <option>Nagad</option>
                </select>
              </div>
                      <div class="form-group">
                        <label for="payment_date">Payment Date *</label>
                        <input type="date" id="payment_date" name="payment_date" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit Payment">
                      </div>
                    </form>

                </div>
                <!-- /.card-body -->
              
            </div>
          </div> 
          <div class="col-lg-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Payment Method</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                      <p>**You have to pay total 2000 Tk. per shop. It's a 6 month agreement. After 6 month again you must pay 2000 Tk., if you want to continue activate your shop. Otherwise you shop will be deleted. Thank You!</p>
                      <p>**You advance payment have to be 500 Tk. minimum.</p>
                      <p>**Make sure your payment accepted by admin or not.</p>
                      <p>**Please save your Bkash/Nagad payment history for future evidence.</p>
                      <div class="col-12 mb-4 mt-4">
                        <a href="#"><img src="payment_method/bkash.svg" height="100" alt="bkash"></a>
                        <p><b>Merchant Number: 01857451548, 01874515487</b></p>
                      </div>

                      <div class="col-12 mb-4">
                        <a href="#"><img src="payment_method/nagad.svg" height="100" alt="nagad"></a>
                        <p><b>Merchant Number: 01874512542, 018454854855</b></p>
                      </div>
                  </div>
                <!-- /.card-body -->
              
            </div>
          </div>         
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
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="../index.php">Binimoy.XYZ</a>.</strong>
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
