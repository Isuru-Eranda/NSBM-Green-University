<?php 
    session_start();
    if(isset($_SESSION['user_email']) && isset($_SESSION['user_type'])) {
      header("Location: index.php");
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
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo"><img src="../icons/white.png"></div>
        <div class="text">Exploring new horizons, one destination at a time.</div>
    </div>
    <div class="form">
        <div class="form-text">Log-in</div>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" name="login" class="btn btn-custom">Login</button>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST["login"])) {
  $email=$_POST["email"];
  $conf_password=$_POST["password"];
  $sql_select_user="SELECT * FROM `renthub_users` WHERE user_email='$email' && user_type='admin';";
  $result_select_user=mysqli_query($conn, $sql_select_user);
  if(mysqli_num_rows($result_select_user) > 0) {
    $row_select_user = mysqli_fetch_assoc($result_select_user);
    $password=$row_select_user['user_password'];
    if(password_verify($conf_password, $password)) {
      $_SESSION['user_email']=$email;
      $_SESSION['user_type']='admin';
      echo "<script>alert('Login Successful')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }else{
      echo "<script>alert('Invalid Credentials')</script>";
    } 
  }else{
    echo "<script>alert('Invalid Credentials')</script>";
  } 
}
?>