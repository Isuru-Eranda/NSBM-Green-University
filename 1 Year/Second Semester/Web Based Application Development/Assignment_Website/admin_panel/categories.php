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
    <link rel="stylesheet" href="categories.css">
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
        <div class="header"> Categories</div>
        <div class="container">
            <div class="row" id="main">
                <?php 
                    if(isset($_GET['view'])) {
                        include('includes/categories_view.php');
                    }
                    if(isset($_GET['insert'])) {
                        include('includes/categories_insert.php');
                    }
                    if(isset($_GET['edit'])) {
                        include('includes/categories_edit.php');
                    }
                    if(isset($_GET['delete'])) {
                        $category_id = $_GET['delete'];
                        $sql_delete_category = "DELETE FROM `renthub_categories` WHERE category_id=$category_id";
                        $result_delete_category = mysqli_query($conn,$sql_delete_category);
                        if($result_delete_category){
                            echo "<script>alert('category deleted successfully')</script>";
                            echo "<script>window.open('categories.php?view','_self')</script>";
                        } else {
                            echo "<script>alert('Error: Unable to delete the category at the moment. Please try again later.');</script>";
                        }
                    }
                ?> 
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
