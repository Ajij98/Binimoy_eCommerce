<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../login.php');
  }
 ?>


  <!--Order confirmation section-->
  <?php
   $db = new Database();

     if(isset($_GET['order_id']))
     {
       $order_id = $_GET['order_id'];

       $sql = "SELECT order_verify_status FROM tb_order_product WHERE order_verify_status = 0 AND order_id = $order_id LIMIT 1";

       $result = $db->link->query($sql) or die($this->link->error.__LINE__);

       if($result->num_rows == 1)
       {
         $sql = "UPDATE tb_order_product SET order_verify_status = 1 WHERE order_id = $order_id LIMIT 1";

         $update = $db->link->query($sql) or die($this->link->error.__LINE__);

         if($update)
         {
           ?>
           <script type="text/javascript">

             window.alert("Order confirmed successfully.");
             window.location='customer_order.php';

           </script>
           <?php
         }
         else
         {
           echo $db->link->error;
         }
       }
       else
       {
         $msg = '<br /><br /><br /><div class="alert alert-danger w-50 m-auto text-center">Something went wrong!</div><br />';
         echo $msg;
       }
     }
     else
     {
       die("Something went wrong!");
     }
   ?>
