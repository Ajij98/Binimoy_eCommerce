<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../login.php');
  }
 ?>



            <!-- Delete product -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['product_id']))
            {
              $product_id = $_GET['product_id'];
              $shop_id     = $_GET['shop_id'];

              $sql = "DELETE FROM tb_product WHERE product_id = $product_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.alert("Product deleted successfully.");
                  window.location='view_product_details.php?shop_id=<?php echo $shop_id; ?>';

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


