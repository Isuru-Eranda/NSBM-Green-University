<?php
    session_start();
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
  <title>Luxe Drive | Contact</title>
  <!-- Use the correct Bootstrap and Popper.js versions -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="contact.css">
  <script src="https://kit.fontawesome.com/d5f76a1949.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand fs-4" href="index.php">
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
          <?php
            if(!isset($_SESSION['user_email'])) {
              echo "<a href='login.php' class='nav-icon'>";
            }else{
              echo "<a href='user_area/index.php' class='nav-icon'>";
            }
          ?>
          <i class="fa-solid fa-user" style="color: #f4f0f0;"></i></a>
        </div>
      </div>
    </div>
  </nav>

<!-- Carousel -->
<!--Form-->
<section class="home">
  <div class="container">
    <div class="row" id="main">
      <div class="col-md-6" id="left">
        <h1>Contact Us</h1>
        <form action="" method="POST">
          <div class="input-field">
            <input type="text" name="name" id="name" placeholder=" " required>
            <label for="name">Name</label>
          </div>
          <div class="input-field">
            <input type="email" name="email" id="email" placeholder=" " required>
            <label for="email">Email</label>
          </div>
          <div class="input-field">
            <input type="text" name="subject" id="subject" placeholder=" " required>
            <label for="subject">Subject</label>
          </div>
          <div class="input-field">
            <textarea name="message" cols="10" rows="5" placeholder=" " required></textarea>
            <label for="message">Message</label>
          </div>
          <div class="button-area">
            <div class="row">
            <div class="col-md-6">
              <button type="submit" name="submit">Send</button>
            </div>
          </div>
          </div>
        </form>
      </div>
      <div class="col-md-6" id="right">
        <h3>Call Us</h3>
        <p>+94 11 544 5000 <br>+94 71 244 5000</p>
        <h3>Address</h3>
        <p>NSBM Green University Town, <br>Pitipana - Thalagala Rd, Homagama</p>
		  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15846.303361252902!2d80.0415729!3d6.8213291!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2523b05555555%3A0x546c34cd99f6f488!2sNSBM%20Green%20University!5e0!3m2!1sen!2slk!4v1697967540142!5m2!1sen!2slk" width="650" height="317rem" style="border:1px solid rgba(34, 40, 49, 0.35);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>
<footer class="footerbg text-white pt-5 pb-4">
    <div class="container text-center text-md-left">
      <div class="row text-center text-md-left">

        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 mr-3 font-weight-bold">
            <img src="icons/white.png" alt="" width="70">
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

<?php
	if(isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$heading = $_POST['subject'];
		$message = $_POST['message'];

		if(!empty($email) && !empty($message)) {
			if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
				$receiver = "garukavassalaarachchi@gmail.com";
				$subject = "From: $name <$email>";
				$body = "Name: $name\nEmail: $email\n\nSubject: $heading\n\n Message: $message\n\nRegards,\n$name";
				$sender = "From: $email";
				if(mail($receiver, $subject, $body, $sender)){
					echo "<script>alert('Your Message has been sent!')</script>";
				}else{
					echo "<script>alert('Sorry, failed to send your Message!')</script>";
				}
			}else{
				echo "<script>alert('Enter a valid Email address!')</script>";
			}
		}else{
			echo "<script>alert('Email and Message is required!')</script>";
		}
	}
?>