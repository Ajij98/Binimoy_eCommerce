<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- My order product table data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_order_product WHERE order_by = '$user_name'";
   $read_my_order = $db->select($sql);
  ?>


  <!-- Order payment table data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_order_payment WHERE paid_by = '$user_name'";
   $read_order_payment = $db->select($sql);
  ?>







<!DOCTYPE html>
<html lang="en">


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Binimoy.XYZ - My Account</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">

    <!-- Fontawsome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- jQuery Datatable Plugin (css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">


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
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">

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
                            <a href="index.php"><i class="icon icon-home"></i> Home</a>
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
                                    <a href="index.php">Shop Now</a>
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
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h3>My Account</h3>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="dashboard">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4 col-lg-2 shadow px-3 py-3" style="border-top: 1px solid; border-radius: 5px;">
                                <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">My Orders</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-payment-history-link" data-toggle="tab" href="#tab-payment-history" role="tab" aria-controls="tab-payment-history" aria-selected="false">Order Payment History</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="return confirm('Sure to logout?')" href="logout_customer.php">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-md-8 col-lg-10 shadow px-4 py-4" style="border-top: 1px solid; border-radius: 5px;">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                        <p style="font-size: 20px;">Hello ! <span class="font-weight-normal text-dark"><?php echo $_SESSION['user_name']; ?></span> <br>

                                            Welcome to <a href="index.php"><b style="font-size: 16px;"><span style="color: #4A5F84;">Binimoy</span>.<span class="text-danger">X</span><span class="text-info">Y</span><span class="text-success">Z</span></b></a>

                                        </p>
                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade px-3 py-3" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                      <table class="table table-cart table-mobile" id="my_order_table">
                                        <thead>
                                          <tr>
                                            <th>Order Id</th>
                                            <th>Order Code</th>
                                            <th>Product Image</th>
                                            <th>Product Id</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Product Type</th>
                                            <th>Product Price</th>
                                            <th>Quantity</th>
                                            <th>Shop Name</th>
                                            <th>Order Verify Status</th>
                                            <th>Make Payment</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>

                                        <tbody>

                                          <?php if($read_my_order){ $i = 0; ?>
                                          <?php while($result = $read_my_order->fetch_assoc()){ $i = $i + 1; ?>
                                          <tr>
                                            <td class="text-success" style="font-weight: bold;"><?php echo "Order Id-".$result['order_id']; ?></td>
                                            <td><?php echo $result['order_code']; ?></td>
                                            <td>
                                              <img src="<?php echo "../Shop_Owner_Panel/pages/".$result['product_image']; ?>" height="80" alt="product_image">
                                            </td>
                                            <td><?php echo "Product Id-".$result['product_id']; ?></td>
                                            <td><?php echo $result['product_name']; ?></td>
                                            <td><?php echo $result['product_code']; ?></td>
                                            <th><?php echo $result['product_type']; ?></th>
                                            <td><?php echo "Tk. ".$result['product_price']; ?></td>
                                            <td><?php echo $result['quantity']; ?></td>
                                            <td><?php echo $result['shop_name']; ?></td>
                                            <td>
                                                <?php
                                                    $order_verify_status = $result['order_verify_status'];

                                                    if($order_verify_status == 1)
                                                                            {
                                                        $msg = '<div class="m-auto badge badge-success">Order Confirmed</div><br />';
                                                            echo $msg;
                                                    }
                                                    else
                                                    {
                                                        $msg = '<div class="m-auto badge badge-danger">Pending...</div><br />';
                                                            echo $msg;
                                                    }
                                                ?>
                                            </td>
                                            <td><a href="make_payment.php?order_id=<?php echo $result['order_id']; ?>" class="btn btn-round btn-sm" style="background-color: #A6C76C; color: white;">Make Payment</a></td>
                                            <td>
                                              <a onclick="return confirm('Sure to delete order?')" href="delete_data.php?order_id=<?php echo $result['order_id']; ?>" title="cancel order" class="btn-remove d-inline"><i class="fa fa-trash-o text-danger ml-4"></i></a>
                                            </td>
                                          </tr>
                                          <?php } ?>
                                          <?php }else{ ?>
                                          <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                            echo $msg; ?>
                                          <?php } ?>

                                        </tbody>
                                      </table><!-- End .table table-wishlist -->
                                    </div><!-- .End .tab-pane -->

                                    

                                    

                    <div class="tab-pane fade" id="tab-payment-history" role="tabpanel" aria-labelledby="tab-payment-history-link">
                      <table class="table table-cart table-mobile" id="payment_history_table">
                        <thead>
                          <tr>
                            <th>Payment Id</th>
                            <th>Payment Code</th>
                            <th>Order Id</th>
                            <th>Order Code</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Paid Amount</th>
                            <th>Payment Method</th>
                            <th>TrxID</th>
                            <th>Payment Screenshot</th>
                            <th>Payment Verify Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php if($read_order_payment){ $i = 0; ?>
                          <?php while($result = $read_order_payment->fetch_assoc()){ $i = $i + 1; ?>
                          <tr>
                            <td class="text-success" style="font-weight: bold;"><?php echo "Payment Id-".$result['payment_id']; ?></td>
                            <td><?php echo $result['payment_code']; ?></td>
                            <td><?php echo "Order Id-".$result['order_id']; ?></td>
                            <td><?php echo $result['order_code']; ?></td>
                            <td><?php echo $result['product_name']; ?></td>
                            <td><?php echo "Tk. ".$result['product_price']; ?></td>
                            <td><?php echo "Tk. ".$result['paid_amount']; ?></td>
                            <td><?php echo $result['payment_method']; ?></td>
                            <td class="text-success"><?php echo "TrxID: ".$result['trx_id']; ?></td>
                            <td>
                                <img src="<?php echo $result['payment_ss']; ?>" height="80" alt="payment_screenshot_image">
                            </td>
                            <td>
                                <?php
                                    $payment_verify_status = $result['payment_verify_status'];

                                    if($payment_verify_status == 1)
                                                            {
                                        $msg = '<div class="m-auto badge badge-success">Payment accepted</div><br />';
                                            echo $msg;
                                    }
                                    else
                                    {
                                        $msg = '<div class="m-auto badge badge-danger">Not accept yet...</div><br />';
                                            echo $msg;
                                    }
                                ?>
                            </td>
                            <td>
                                <a onclick="return confirm('Sure to delete payment history?')" href="delete_data.php?payment_id=<?php echo $result['payment_id']; ?>" title="cancel order" class="btn-remove d-inline ml-4"><i class="fa fa-trash-o text-danger"></i></a>
                            </td>
                            
                          </tr>
                          <?php } ?>
                          <?php }else{ ?>
                          <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                          echo $msg; ?>
                          <?php } ?>

                        </tbody>
                      </table><!-- End .table table-wishlist -->
                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>First Name *</label>
                                                    <input type="text" class="form-control" required>
                                                </div><!-- End .col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <label>Last Name *</label>
                                                    <input type="text" class="form-control" required>
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <label>Display Name *</label>
                                            <input type="text" class="form-control" required>
                                            <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                            <label>Email address *</label>
                                            <input type="email" class="form-control" required>

                                            <label>Current password (leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control">

                                            <label>New password (leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control">

                                            <label>Confirm new password</label>
                                            <input type="password" class="form-control mb-2">

                                        <input type="submit" class="btn btn-primary btn-round" value="Save Changes">

                                        </form>
                                    </div><!-- .End .tab-pane -->
                                </div>
                            </div><!-- End .col-lg-9 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .dashboard -->
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
                                <a href="index.php">Shop Now</a>
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
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- JQuery datatable plugin (js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->
</html>

<!-- My Order Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#my_order_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#my_order_table_wrapper .col-md-6:eq(0)' );
  } );

</script>

<!-- My Product Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#my_product_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#my_product_table_wrapper .col-md-6:eq(0)' );
  } );

</script>

<!-- Payment History Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#payment_history_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#payment_history_table_wrapper .col-md-6:eq(0)' );
  } );

</script>
