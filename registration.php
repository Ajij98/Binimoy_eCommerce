<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

 ?>

<!--User registration section-->
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_POST['submit']))
  {
    if(checkEmail())
    {
      if(checkUsername())
      {
        if(matchPassword())
        {
          $name      = $_POST['name'];
          $email     = $_POST['email'];
          $phone     = $_POST['phone'];
          $address   = $_POST['address'];
          $user_name = $_POST['user_name'];
          $password  = $_POST['password'];
          $user_type = $_POST['user_type'];

          $sql = "INSERT INTO          tb_user(name,email,phone,address,user_name,password,user_type,entry_time)values('$name','$email','$phone','$address','$user_name','$password','$user_type','$current_datetime')";
          $insert_row = $db->insert($sql);

          if($insert_row)
          {
            ?>

           <script type="text/javascript">
             window.alert("Registration successfull, You may login now. Thank You!");
             window.location='login.php';
           </script>

           <?php

          }
          else {
            $msg = '<div class="alert alert-danger w-50 m-auto"><strong>Error!</strong> Something went wrong!</div><br />';
          }
        }
      }
    }
  }
  function checkEmail()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE email='".$_POST['email']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning! This email already exist.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function checkUsername()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE user_name='".$_POST['user_name']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning! This username already exist.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function matchPassword(){
    if($_POST['password'] !== $_POST['confirm_password'])
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning! Password and Confirm password should match.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
 ?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Binimoy.XYZ - Registration</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/nav_logo.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/nav_logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/nav_logo.png">
  <link rel="manifest" href="assets/images/icons/site.html">
  <link rel="mask-icon" href="assets/images/icons/nav_logo.png" color="#666666">
  <link rel="shortcut icon" href="assets/images/icons/nav_logo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="login_registration_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="login_registration_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="login_registration_assets/dist/css/adminlte.min.css">

  <!-- Fontawsome(v-4.7.0) -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

  <!-- Google Font CDN -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">

</head>
<body class="hold-transition register-page">

    <br><br><br>
<div class="register-box">
  <div class="register-logo">
    <a href="index.php" class="logo px-2">
      <h4 class="d-inline"><img src="assets/nav_logo/1.png" width="35" class="d-inline mb-1"> <b style="font-family: 'Vollkorn', serif;"><span style="color: #4A5F84;">Binimoy</span>.<span class="text-danger">X</span><span class="text-info">Y</span><span class="text-success">Z</span></b></h4>
    </a>
  </div>

  <div class="card px-3 py-3">
    <div class="card-body register-card-body px-3 py-3">
      <p class="login-box-msg">Sign Up Here!</p>

      <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="phone" placeholder="Phone number" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <textarea rows="2" class="form-control" id="address" name="address" placeholder="Address" required></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="user_name" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirm_password" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" id="user_type" name="user_type" required>
            <option selected>Choose your type...</option>
            <option>Shop Owner</option>
            <option>Customer</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Sign Up" required>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
      </div>

      <a href="login.php" class="text-center">I already have a membership.</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

  <br><br><br>


</div>
<!-- /.register-box -->



<!-- jQuery -->
<script src="login_registration_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="login_registration_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="login_registration_assets/dist/js/adminlte.min.js"></script>
</body>
</html>
