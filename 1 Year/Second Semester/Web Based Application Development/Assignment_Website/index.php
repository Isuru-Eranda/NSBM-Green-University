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
  <title>Luxe Drive | Home</title>
  <!-- Use the correct Bootstrap and Popper.js versions -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="index.css">
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

  <section class="home">
    <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-controls">

        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1" style="background-image: url(image/1.jpg);"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"
            style="background-image: url(image/145011.jpg);"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"
            style="background-image: url(image/2017-mercedes-benz-metris-review.jpg);"></button>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <i class="fa-solid fa-arrow-left" style="color: #fcfcfc;"></i>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <i class="fa-solid fa-arrow-right" style="color: #fcfdfd;"></i>
        </button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url(image/1.jpg);">
          <div class="container">
            <h2>Luxury Cars</h2>
            <p>Explore luxury with our premier car collection.</p>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(image/145011.jpg);">
          <div class="container">
            <h2>4WD & SUV Vehicles</h2>
            <p>Discover adventure in our versatile 4WD and SUVs.</p>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(image/2017-mercedes-benz-metris-review.jpg);">
          <div class="container">
            <h2>BUSES, VANS AND MPV</h2>
            <p>Rent Buses, Vans, and MPVs for your group travel.</p>
          </div>
        </div>
      </div>

    </div>
  </section>



  <!-- cards -->

  <div class="container-fluid mx-auto">
    <h1 class="toprate text-center py4 mt-5"><b>RECOMMENDED VEHICLES</b></h1>

    
    <div class="row g-4 mt-4 mb-5">
      <div class="col-md-3">
        <div class="card">
          <img src="image/mitsubishi-montero-sri-lanka.jpg" alt="..." class="">
          <div class="card-body">
            <h5 class="card-title"><b>MITSUBISHI MONTERO</b></h5>
            <p class="card-text"><i>Embark on adventure with the rugged, spacious, and safe Mitsubishi Montero. Rent now for your next thrilling journey.</i></p>

          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="image/daitatsu-terios-sri-lanka.jpg" alt="..." class="">
          <div class="card-body">
            <h5 class="card-title"><b>DAIHATSU TERIOS</b></h5>
            <p class="card-text"><i>Experience versatility with the Daihatsu Terios. Compact, agile, and reliable. Rent now for urban exploration and beyond.</i></p>

          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="image/perodua-bezza-prime-sedan-sri-lanka.jpg" alt="..." class="">
          <div class="card-body">
            <h5 class="card-title"><b>PERODUA BEZZA PRIME SEDAN</b></h5>
            <p class="card-text"><i>Efficiency meets style in the Perodua Bezza Prime Sedan. Compact, sleek, and fuel-efficient. Rent now for a smooth and stylish ride.</i></p>

          </div>
        </div>
      </div>
    </div>


  </div>
  <div class="container border-bottom border-dark"></div>



  <div class="container-fluid mx-auto">
    <h1 class="toprate text-center py4 mt-5"><b>FEATURED VEHICLES</b></h1>
  

  <br>

  <div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
      <div class="card h-100">
        <img src="image/toyota-premio-sri-lanka.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><b>TOYOTA PREMIO </b></h5>
          <p class="card-text">Indulge in sophistication with the Toyota Premio. A seamless blend of elegance and performance, this sedan promises a luxurious journey. Rent now for an elevated driving experience.</p>
        </div>
        
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="image/mercedes-benz-new-e-class-sri-lanka.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><b>MERCEDES BENZ NEW E-CLASS</b></h5>
          <p class="card-text">Elevate your drive with the Mercedes-Benz New E-Class. Impeccable design, cutting-edge technology, and refined performance redefine luxury. Rent now for a premier automotive experience.</p>
        </div>
        
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="image/Toyota-Rav-4.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><b>TOYOTA RAV 4</b></h5>
          <p class="card-text">Unleash versatility with the Toyota RAV4. A dynamic blend of style, efficiency, and capability. Rent now for an adventurous journey, whether on city streets or rugged trails.</p>
        </div>
       
      </div>
    </div>
  </div>
</div>
  <br><br>



  <!-- Footer -->
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
  


  <script src="index.js"></script>
</body>

</html>
