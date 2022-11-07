<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../login.php');
  }
 ?>


          <!-- Delete Shop -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['shop_id']))
            {
              $shop_id = $_GET['shop_id'];

              $sql = "DELETE FROM tb_shop WHERE shop_id = $shop_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Shop deleted successfully.");
                  window.location='manage_shop.php';

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





            <!-- Delete shop payment history -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['payment_id']))
            {
              $payment_id = $_GET['payment_id'];

              $sql = "DELETE FROM tb_shop_payment WHERE payment_id = $payment_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Shop payment deleted successfully.");
                  window.location='shop_payment_history.php';

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




            <!-- Delete customer order history -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['order_id']))
            {
              $order_id = $_GET['order_id'];

              $sql = "DELETE FROM tb_order_medicine WHERE order_id = $order_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Order history deleted successfully.");
                  window.location='customer_order.php';

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



            <!-- Delete customer review -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['review_id']))
            {
              $review_id = $_GET['review_id'];

              $sql = "DELETE FROM tb_shop_review WHERE review_id = $review_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Review deleted successfully.");
                  window.location='shop_review.php';

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



