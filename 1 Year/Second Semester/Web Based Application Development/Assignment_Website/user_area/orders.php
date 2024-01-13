<?php
    session_start();
    if(!isset($_SESSION['user_email'])) {
        header("Location: login.php");
        exit();
    }
    include("../connection.php");



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

    $sql_delete_order = "DELETE FROM `renthub_orders` WHERE order_confirm='pending';";
    $result_delete_order = mysqli_query($conn,$sql_delete_order);
    $user_email = $_SESSION['user_email'];
    $sql_select_user = "SELECT * FROM `renthub_users` WHERE user_email='$user_email';";
    $result_select_user = mysqli_query($conn,$sql_select_user);
    $row_select_user = mysqli_fetch_assoc($result_select_user);
    $user_id = $row_select_user['user_id'];
    $user_type = $row_select_user['user_type'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../icons/white.png">
  <title>Luxe Drive | My Account</title>
  <!-- Use the correct Bootstrap and Popper.js versions -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="index.css">
  <script src="https://kit.fontawesome.com/d5f76a1949.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand fs-4" href="../index.php">
        <img src="../icons/white.png" alt="" width="70">
      </a>
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarID">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link active nav-center" aria-current="page" href="../index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link nav-center" href="../products.php">Vehicles</a></li>
          <li class="nav-item"><a class="nav-link nav-center" href="../about.php">About</a></li>
          <li class="nav-item"><a class="nav-link nav-center" href="../contact.php">Contact</a></li>
        </ul>
        <div class="nav-link nav-center right">
          <form action="../products.php" method="get">
            <input type="search" name="search_product" placeholder="Search..." autocomplete="off">
          </form>
            <a href='index.php' class='nav-icon'>
          <i class="fa-solid fa-user" style="color: #f4f0f0;"></i></a>
        </div>
      </div>
    </div>
  </nav>
        <div class="container" id="main-container">
        <div id="main">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                    <ul>
                        <li><a href="index.php">My Account</a></li>
                        <li><a href="orders.php">My Orders</a></li>
                        <?php if($user_type=='admin') {
                          echo '<li><a href="../admin_panel/index.php">Admin Panel</a></li>';
                        }
                        ?>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php
                        if(isset($_GET["delete"])) {
                            $order_id = $_GET["delete"];
                            $sql_delete_order = "DELETE FROM `renthub_orders` WHERE order_id=$order_id;";
                            $result_delete_order = mysqli_query($conn,$sql_delete_order);
                            if ($result_delete_order) {
                                echo "<script>alert('Order deleted successfully.'); window.location.href = 'orders.php';</script>";
                            } else {
                                echo "<script>alert('Error: Unable to delete the order at the moment. Please try again later.');</script>";
                            }
                        }
                    ?>
                    <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Invoice</th>
                                    <th>Vehicle</th>
                                    <th>From</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th style='text-align: center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql_select_orders = "SELECT * FROM `renthub_orders` WHERE user_id=$user_id;";
                                    $result_select_orders = mysqli_query($conn, $sql_select_orders);

                                    if (mysqli_num_rows($result_select_orders) > 0) {
                                        while ($order = mysqli_fetch_assoc($result_select_orders)) {
                                            $order_id = $order['order_id'];
                                            $order_invoice = $order['order_invoice'];
                                            $product_id = $order['product_id'];
                                            $order_from = $order['order_from'];
                                            $order_status = $order['order_status'];
                                            $order_amount = $order['order_amount'];
                                            $order_payment = $order['order_payment'];

                                            $sql_select_products = "SELECT * FROM `renthub_products` WHERE product_id=$product_id";
                                            $result_select_products = mysqli_query($conn,$sql_select_products);
                                            $row_select_products = mysqli_fetch_assoc($result_select_products);
                                            $product_name = $row_select_products["product_name"];

                                            echo "<tr>
                                                    <td>$order_id</td>
                                                    <td>$order_invoice</td>
                                                    <td>$product_name</td>
                                                    <td>$order_from</td>
                                                    <td>$order_status</td>
                                                    <td>$order_payment</td>
                                                    <td style='text-align: center'>
                                                        <a href='orders.php?delete=$order_id'><i class='fa-solid fa-trash' style='color: #000000a1;font-size: 13px;'></i></a>
                                                    </td>
                                                </tr>";
                                        }
                                    } 
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="footerbg text-white pt-5 pb-4">
    <div class="container text-center text-md-left">
      <div class="row text-center text-md-left">

        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 mr-3 font-weight-bold">
            <img src="../icons/white.png" alt="" width="70">
          </h5>
          <p>Exploring new horizons, one destination at a time.</p>

        </div>

        <div class="col-md-2 col-lg-2 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold"><b>Support</b></h5>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Terms & Conditions</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Privacy</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Cookie Preferences</a>
          </p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold"><b>Contact Us</b></h5>
          <p>
            <i class="fas fa-envelope mr-3"></i> luxedrive@gmail.com
          </p>
          <p>
            <i class="fas fa-phone mr-3"></i> +94 11 544 5000
          </p>
          <p>
            <i class="fas fa-phone mr-3"></i> +94 71 244 5000
          </p>
        </div>
      </div>
      <ul class="list-unstyled list-inline">
        <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-facebook"></i></a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-google"></i></a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-linkedin-in"></i></a>
        </li>
      </ul>
    </div>
    <hr class="mb-4">

    <p class="text-center">Copyright @2023 - All Rights Reserved by Luxe Drive</p>

  </footer>
</body>

</html>