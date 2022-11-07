<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../login.php');
  }
 ?>



  <!-- Shop payment table data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db        = new Database();
   $sql       = "SELECT * FROM tb_shop_payment";
   $read_shop_payment = $db->select($sql);
  ?>









<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Binimoy.XYZ | Shop Payment History</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
        <div class="image">
          <img src="img/profile_img.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> User : <b><?php echo $_SESSION['user_name']; ?></b></a>
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
            <a href="add_area.php" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Add Area
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="manage_area.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Manage Area
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
            <a href="shop_payment_history.php" class="nav-link active">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Shop Payment History
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
            <a href="shop_owner.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Shop Owner
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="registered_customer.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Registered Customer
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a onclick="return confirm('Sure to logout?')" href="logout_admin.php" class="nav-link">
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
            <h1>Shop Payment History</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Shop Payment History</li>
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
                <h3 class="card-title">Payment List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">

                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <tr>
                      <th>Payment Id</th>
                      <th>Payment Code</th>
                      <th>Shop Id</th>
                      <th>Shop Name</th>
                      <th>Shop Code</th>
                      <th>Shop Address</th>
                      <th>Paid Amount</th>
                      <th>Paid By</th>
                      <th>TrxID</th>
                      <th>Payment Screenshot</th>
                      <th>Payment Date</th>
                      <th>Payment Verify Status</th>
                      <th>Accept Payment</th>
                      <th>Owner Name</th>
                      <th>Owner Contact</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php if($read_shop_payment){ $i = 0; ?>
                    <?php while($result = $read_shop_payment->fetch_assoc()){ $i = $i + 1; ?>
                    <tr>
                      <td class="text-success" style="font-weight: bold;"><?php echo "Payment Id-".$result['payment_id']; ?></td>
                      <td><?php echo $result['payment_code']; ?></td>
                      <td><?php echo "Shop Id-".$result['shop_id']; ?></td>
                      <td><?php echo $result['shop_name']; ?></td>
                      <td><?php echo $result['shop_code']; ?></td>
                      <td><?php echo $result['shop_location_details']; ?></td>
                      <td><?php echo $result['paid_amount']." Tk."; ?></td>
                      <td><?php echo $result['paid_by']; ?></td>
                      <td class="text-success"><?php echo $result['trx_id']; ?></td>
                      <td><img src="<?php echo "../../Shop_Owner_Panel/pages/".$result['payment_ss']; ?>" alt="payment_ss" height="100"></td>
                      <td><?php echo $result['payment_date']; ?></td>
                      <td>
                          <?php
                            $payment_verify_status = $result['payment_verify_status'];

                              if($payment_verify_status == 1)
                              {
                                  $msg = '<div class="m-auto badge badge-success">Payment Accepted</div><br />';
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
                          <?php
                              $payment_verify_status = $result['payment_verify_status'];

                              if($payment_verify_status == 1)
                              {
                                ?>
                                  <button type="button" class="btn btn-success btn-rounded btn-sm" name="button" disabled><i class="fa fa-check"></i> Accepted</button>
                                <?php
                              }
                              else
                              {
                                ?>
                                  <a href="payment_verification.php?payment_id=<?php echo $result['payment_id']; ?>" onclick="return confirm('Sure to accept payment?')" class="btn btn-success btn-rounded btn-sm" >Accept Payment</a>
                                <?php
                              }
                            ?>
                        </td>
                      <td><?php echo $result['name']; ?></td>
                      <td><?php echo $result['phone']; ?></td>
                      <td>
                        <a href="delete_data.php" title="delete" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm btn-round waves-effect waves-light"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                    <?php }else{ ?>
                    <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                      echo $msg; ?>
                    <?php } ?>

                  </tbody>
                </table>

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
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>





<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
