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
    $user_firstname = $row_select_user["user_firstname"];
    $user_lastname = $row_select_user["user_lastname"];
    $user_email = $row_select_user["user_email"];
    $user_contact = $row_select_user["user_contact"];
    $user_address = $row_select_user["user_address"];
    $user_address_city = $row_select_user["user_address_city"];
    $user_address_state = $row_select_user["user_address_state"];
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
                        if(isset($_POST["update"])) {
                            $user_firstname = $_POST["user_firstname"];
                            $user_lastname = $_POST["user_lastname"];
                            $user_contact = $_POST["user_contact"];
                            $user_address = $_POST["user_address"];
                            $user_address_city = $_POST["user_address_city"];
                            $user_address_state = $_POST["user_address_state"];
                            $sql_update_user="UPDATE `renthub_users` SET user_firstname='$user_firstname',user_lastname='$user_lastname',user_contact='$user_contact',user_address='$user_address',user_address_city='$user_address_city',user_address_state='$user_address_state' WHERE user_email='$user_email'";
                            $result_update_user = mysqli_query($conn,$sql_update_user);
                            if ($result_update_user) {
                                echo "<script>alert('Account updated successfully.'); window.location.href = 'index.php';</script>";
                            } else {
                                echo "<script>alert('Error: Unable to update the account at the moment. Please try again later.');</script>";
                            }
                        }

                        if(isset($_GET["delete"])) {
                            $sql_delete_user = "DELETE FROM `renthub_users` WHERE user_email='$user_email';";
                            $result_delete_user = mysqli_query($conn,$sql_delete_user);
                            if ($result_delete_user) {
                                echo "<script>alert('Account deleted successfully.'); window.location.href = 'logout.php';</script>";
                            } else {
                                echo "<script>alert('Error: Unable to delete the account at the moment. Please try again later.');</script>";
                            }
                        }
                    ?>


                    <form action="" method="post" enctype="multipart/form-data" class="p-4">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="user_firstname" class="form-label">First Name:</label>
                                <input type="text" id="user_firstname" name="user_firstname" value="<?php echo $user_firstname?>" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="user_lastname" class="form-label">Last Name:</label>
                                <input type="text" id="user_lastname" name="user_lastname" value="<?php echo $user_lastname?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email:</label>
                            <input type="email" id="user_email" name="user_email" value="<?php echo $user_email?>" class="form-control" required disabled>
                        </div>

                        <div class="mb-3">
                            <label for="user_address" class="form-label">Address:</label>
                            <input type="text" id="user_address" name="user_address" value="<?php echo $user_address?>" class="form-control" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                            <label for="user_address_state" class="form-label">State:</label>
                            <input type="text" id="user_address_state" name="user_address_state" value="<?php echo $user_address_state?>" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="user_address_city" class="form-label">City:</label>
                            <input type="text" id="user_address_city" name="user_address_city" value="<?php echo $user_address_city?>" class="form-control" required>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label for="user_contact" class="form-label">Contact No:</label>
                            <input type="text" id="user_contact" name="user_contact" value="<?php echo $user_contact?>" class="form-control" required>
                        </div>
                        <div class="buttons">
                        <button type="submit" name="update" class="btn btn-custom">UPDATE ACCOUNT</button>
                        <a href="index.php?delete" class="btn btn-danger">Delete Account</a>
                        </div>
                    </form>
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