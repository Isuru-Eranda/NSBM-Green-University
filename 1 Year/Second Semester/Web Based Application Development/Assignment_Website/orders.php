<?php
    session_start();
    if(!isset($_SESSION['user_email'])) {
      header("Location: login.php");
      exit();
    }
    /*
    session_unset();
    session_destroy();
    */

    include("connection.php");

    function getIPAddress() {  
       if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                  $ip = $_SERVER['HTTP_CLIENT_IP'];  
          }  

      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
       }  
      else{  
               $ip = $_SERVER['REMOTE_ADDR'];  
       }  
       return $ip;  
    } 
    $ip_address = getIPAddress();

    $user_email = $_SESSION['user_email'];
    $sql_select_user = "SELECT * FROM `renthub_users` WHERE user_email='$user_email';";
    $result_select_user = mysqli_query($conn,$sql_select_user);
    $row_select_user = mysqli_fetch_assoc($result_select_user);
    $user_id = $row_select_user['user_id'];

    

    if(isset($_POST['submit'])){
      $delivery_firstname= $_POST['delivery_firstname'];
      $delivery_lastname= $_POST['delivery_lastname'];
      $delivery_address= $_POST['delivery_address'];
      $delivery_address_city= $_POST['delivery_address_city'];
      $delivery_address_state= $_POST['delivery_address_state'];
      $delivery_contact = $_POST['delivery_contact'];
      $sql_insert_delivery = "UPDATE `renthub_orders` SET delivery_firstname='$delivery_firstname',delivery_lastname='$delivery_lastname',delivery_address='$delivery_address',delivery_address_city='$delivery_address_city',delivery_address_state='$delivery_address_state',delivery_contact='$delivery_contact',order_confirm='confirmed'  WHERE user_id=$user_id && order_confirm='pending';";
      $result_update = mysqli_query($conn, $sql_insert_delivery);
    }

    echo "<script>alert('Order is submited Successfully')</script>";
    echo "<script>window.location.href = 'user_area/orders.php'</script>";
?>
