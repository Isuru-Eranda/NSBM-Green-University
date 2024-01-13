<?php
    session_start();
    if(isset($_SESSION['user_email'])) {
      header("Location: user_area/index.php");
      exit();
    }
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="icons/white.png">
<title>Luxe Drive | Login In</title>
<!-- Use the correct Bootstrap and Popper.js versions -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<link rel="stylesheet" href="login.css">
<script src="https://kit.fontawesome.com/d5f76a1949.js" crossorigin="anonymous"></script>
</head>

<body>

<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand fs-4" href="#">
        <img src="icons/white.png" alt="" width="70">
      </a>
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarID">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link active nav-center" aria-current="page" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link nav-center" href="products.php">Vehicles</a></li>
          <li class="nav-item"><a class="nav-link nav-center" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link nav-center" href="contact.php">Contact</a></li>
        </ul>
        <div class="nav-link nav-center right">
          <form action="products.php" method="get">
            <input type="search" name="search_product" placeholder="Search..." autocomplete="off">
          </form>
          <a href="login.php" class="nav-icon"><i class="fa-solid fa-user" style="color: #f4f0f0;"></i></a>
        </div>
      </div>
    </div>
  </nav>

<!--Form-->
<section class="home">
  <div class="container">
    <div class="row" id="main">
      <div class="col-md-6" id="left">
        <img src="image/login.avif" alt="" width="100%" height="729px" style="border-radius: 5px;">
      </div>
      <div class="col-md-6" id="right">
        <h1>Login</h1>
        <form action="" method="POST">
        <div class="input-field">
            <input type="text" id="user_email" placeholder=" " required="required" name="user_email">
            <label for="user_email" class="form-label">Email</label>
          </div> 
          <div class="input-field">
            <input type="password" name="conf_user_password" id="conf_user_password" placeholder=" " required="required">
            <label for="conf_user_password">Password</label>
          </div>
          <div class="button-area">
            <div class="row">
            <div class="col-md-6">
              <button type="submit" name="login" value=" ">Log In</button>
            </div>
            <div class="mt-4 ">
              <p>Don't have an account? <a href="signup.php">Sign Up</a> </p>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!--Footer
<footer class="footerbg text-white pt-5 pb-4">
  <div class="container-footer text-center text-md-left">
    <div class="row text-center text-md-left">

      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 mr-3 font-weight-bold text-warinig">
          <img src="icons/4.png" alt="" width="70">
        </h5>
        <p>Exploring new horizons, one destination at a time.</p>

      </div>

      <div class="col-md-2 col-lg-2 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold text-warinig"><b>Support</b></h5>
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
        <h5 class="text-uppercase mb-4 font-weight-bold text-warinig"><b>Contact Us</b></h5>
        <p>
          <i class="fas fa-home mr-3"></i> Padukka, Gallage Mawatha
        </p>
        <p>
          <i class="fas fa-envelope mr-3"></i> renthub@gmail.com
        </p>
        <p>
          <i class="fas fa-phone mr-3"></i> +94 11919903
        </p>
        <p>
          <i class="fas fa-Location-arrow mr-3"></i> 203 Pitipana, Homagam
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

  <p class="text-center">Copyright @2023 - All Rights Reserved by RentHub</p>

</footer>-->
</body>
</html>

<?php
if(isset($_POST["login"])) {
  $user_email=$_POST["user_email"];
  $conf_user_password=$_POST["conf_user_password"];

  $sql_select_user="SELECT * FROM `renthub_users` WHERE user_email='$user_email';";
  $result_select_user=mysqli_query($conn, $sql_select_user);
  if(mysqli_num_rows($result_select_user) > 0) {
    $row_select_user = mysqli_fetch_assoc($result_select_user);
    $password=$row_select_user['user_password'];
    if(password_verify($conf_user_password, $password)) {
      $_SESSION['user_email']=$user_email;
      echo "<script>alert('Login Successful')</script>";
      $sql_select_cart="SELECT * FROM `renthub_cart` WHERE ip_address='$ip_address'";
      $result_select_cart=mysqli_query($conn,$sql_select_cart);
      if(mysqli_num_rows($result_select_cart) > 0){
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('cart.php','_self')</script>";
      }else{
        echo "<script>window.open('user_area/index.php', '_self')</script>";
      }
    }else{
      echo "<script>alert('Invalid Credentials')</script>";
    } 
  }else{
    echo "<script>alert('Invalid Credentials')</script>";
  } 

}
?>