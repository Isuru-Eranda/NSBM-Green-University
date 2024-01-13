<?php 
    session_start();
    if(!isset($_SESSION['user_email']) || !isset($_SESSION['user_type'])) {
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
    $ip_address = getIPAddress();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../icons/white.png">
    <title>Luxe Drive | Admin Panel</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/d5f76a1949.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../icons/white.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Admin Panel</span>
                </div>
            </div>
            <i class='bx bx-menu toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="categories.php?view">
                        <i class='bx bx-category icon' ></i>
                            <span class="text nav-text">Categories</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="products.php?view">
                        <i class='bx bx-car icon'></i>
                            <span class="text nav-text">Vehicles</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="orders.php?view">
                            <i class='bx bx-list-ul icon' ></i>
                            <span class="text nav-text">Order list</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="users.php?view">
                        <i class='bx bx-user icon' ></i>
                            <span class="text nav-text">Users</span>
                        </a>
                    </li>
                </ul>
            </div>
 
            <div class="bottom-content">
                <li class="">
                    <a href="../user_area/index.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Go Back</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="header"> Dashboard</div>
        <div class="container">
            <div id="main">
                <div class="row">
                <div class="col-md-3">
                        <div class="card">
                            <div>
                            <p>Categories</p>
                                <h2> <?php $sql_select_category="SELECT * FROM `renthub_categories`";
                                                $result_select_category=mysqli_query($conn, $sql_select_category);
                                                $num_select_category=mysqli_num_rows($result_select_category);      
                                                echo $num_select_category;?>
                                </h2>
                                
                            </div>
                            <a href='categories.php?view'><i class='fa-solid fa-chevron-right' style='color: #000000a1;font-size: 13px;'></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div>
                            <p>Products</p>
                                <h2> <?php $sql_select_products="SELECT * FROM `renthub_products`";
                                                $result_select_products=mysqli_query($conn, $sql_select_products);
                                                $num_select_products=mysqli_num_rows($result_select_products);      
                                                echo $num_select_products;?>
                                </h2>
                                
                            </div>
                            <a href='products.php?view'><i class='fa-solid fa-chevron-right' style='color: #000000a1;font-size: 13px;'></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div>
                            <p>Orders</p>
                                <h2> <?php $sql_select_orders="SELECT * FROM `renthub_orders`";
                                                $result_select_orders=mysqli_query($conn, $sql_select_orders);
                                                $num_select_orders=mysqli_num_rows($result_select_orders);      
                                                echo $num_select_orders;?>
                                </h2>
                                
                            </div>
                            <a href='orders.php?view'><i class='fa-solid fa-chevron-right' style='color: #000000a1;font-size: 13px;'></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div>
                            <p>Users</p>
                                <h2> <?php $sql_select_users="SELECT * FROM `renthub_users`";
                                                $result_select_users=mysqli_query($conn, $sql_select_users);
                                                $num_select_users=mysqli_num_rows($result_select_users);      
                                                echo $num_select_users;?>
                                </h2>
                                
                            </div>
                            <a href='users.php?view'><i class='fa-solid fa-chevron-right' style='color: #000000a1;font-size: 13px;'></i></a>
                        </div>
                    </div>
                </div>
                    <div id="main2">
                        <div class="table-header">Order status of the day</div>
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
                                    $sql_select_orders = "SELECT * FROM `renthub_orders` WHERE DATE(order_date) = CURDATE();";
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
                                                        <a href='orders.php?edit=$order_id'><i class='fa-solid fa-chevron-right' style='color: #000000a1;font-size: 13px;'></i></a>
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
        </div>
    </section>

    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle");


        toggle.addEventListener("click" , () =>{
            sidebar.classList.toggle("close");
        })
    </script>

</body>
</html>
