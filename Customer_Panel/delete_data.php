<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


          <!-- Delete order product-->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['order_id']))
            {
              $order_id = $_GET['order_id'];

              $sql = "DELETE FROM tb_order_product WHERE order_id = $order_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Order deleted successfully.");
                  window.location='dashboard.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>


            <!-- Delete order payment history-->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['payment_id']))
            {
              $payment_id = $_GET['payment_id'];

              $sql = "DELETE FROM tb_order_payment WHERE payment_id = $payment_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Payment history deleted successfully.");
                  window.location='dashboard.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>

