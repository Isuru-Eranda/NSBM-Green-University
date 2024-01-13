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
  <title>Luxe Drive | About</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="about.css">
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
            if(!isset($_SESSION['user_name'])) {
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

  <!-- fieldset -->


  <div class="container-fluid">
    <fieldset class="custom-background mx-auto ">
      <div class="container">
        <h1 class="heading">About Us</h1>
        <div class="discription ">
          "Welcome to Luxe Drive, where we bring the luxury of life within reach without the burden of ownership costs. Whether you envision cruising through scenic landscapes in a top-tier convertible sports car, making a lasting impression at a friend’s special occasion in the perfect designer dress, hosting a stylish backyard barbecue illuminated by strings of elegant party lights, or simply discovering a beautifully furnished apartment for a temporary stay - we make it all possible. Our impeccably maintained fleet of high-end vehicles, an extensive collection of couture dresses for every style and event, a diverse range of premium party and garden essentials, and thoughtfully curated rental properties eliminate the obstacles and expenses associated with creating unforgettable memories. With a commitment to dependable service and a dedication to customer satisfaction, Luxe Drive empowers you to explore, express your individuality, entertain with sophistication, and find your temporary home away from home. We believe that life’s most precious moments should not be confined by price tags, which is why we offer the means for you to access the necessities for the experiences you hold dear, all conveniently available for rent."
        </div>
      </div>
    </fieldset><br>
  </div>

  <!-- counter  -->

  <div class="container-1">

    <div class="row">

      <div class="four col-md-2">
        <div class="counter-box colored">
          <i class="fa fa-thumbs-o-up"></i>
          <span class="counter">690</span>
          <p>Happy Customers</p>
        </div>
      </div>
      <div class="four col-md-2">
        <div class="counter-box">
          <i class="fa fa-group"></i>
          <span class="counter">
            <?php 
            $sql_select_users = "SELECT * FROM `renthub_users`;";
            $result_select_users = mysqli_query($conn,$sql_select_users);
            $num_select_users = mysqli_num_rows($result_select_users);
            echo $num_select_users;
            ?>
          </span>
          <p>Registered Members</p>
        </div>
      </div>
      <div class="four col-md-2">
        <div class="counter-box">
          <i class="fa  fa-shopping-cart"></i>
          <span class="counter">
          <?php 
            $sql_select_products = "SELECT * FROM `renthub_products`;";
            $result_select_products = mysqli_query($conn,$sql_select_products);
            $num_select_products = mysqli_num_rows($result_select_products);
            echo $num_select_products;
            ?>
          </span>
          <p>Available Products</p>
        </div>
      </div>
      <div class="four col-md-2">
        <div class="counter-box">
          <i class="fa  fa-user"></i>
          <span class="counter">420</span>
          <p>Saved Trees</p>
        </div>
      </div>
    </div>
  </div><br><br><br><br>

  <!-- topic  -->

  <div class="topic-members">
    <p class="topic">OUR TEAM <br>
      <span class="crew">MEMBERS</span>
    </p>
    <p class="topic-paragraph">"Welcome to our team of undergraduate software engineering and computer sciences students
      from NSBM Green
      University. Comprising passionate individuals, our diverse crew collaborates to present our inaugural project a
      website designed to serve as a valuable resource for anyone seeking information and assistance. Explore the
      expertise of our NSBM community through this innovative platform"</p>
  </div><br>


  <!-- cards  -->

  <div class="row">
    <!-- DEMO 1 Item-->
    <div class="col-lg-4 mb-3 mb-lg-0">
      <div class="hover hover-1 text-white rounded"><img src="card_img/IMG_3071.jpg" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">JAITH
            </span>SANDIV</h3>
          <p class="hover-1-description font-weight-light mb-0">Front end and Back end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
    <!-- DEMO 2 Item-->
    <div class="col-lg-4">
      <div class="hover hover-1 text-white rounded"><img src="card_img/garuka.JPG" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">GARUKA
            </span>VEENATH</h3>
          <p class="hover-1-description font-weight mb-0">Front end and Back end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
  </div> <br>

  <div class="row">
    <!-- DEMO 3 Item-->
    <div class="col-lg-4 mb-3 mb-lg-0">
      <div class="hover hover-1 text-white rounded"><img src="card_img/pubudu.jpeg" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">PUBUDU
            </span>CHANDIMA</h3>
          <p class="hover-1-description font-weight-light mb-0">Front end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
    <!-- DEMO 4 Item-->
    <div class="col-lg-4">
      <div class="hover hover-1 text-white rounded"><img src="card_img/mudith.jpeg" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">MUDITH
            </span>MILINDA</h3>
          <p class="hover-1-description font-weight-light mb-0">Front end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href="https://www.instagram.com/mudith_m_gallage/"><i class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href="https://www.facebook.com/gallage.mudith"><i class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
  </div><br>

  <div class="row">
    <!-- DEMO 5 Item-->
    <div class="col-lg-4 mb-3 mb-lg-0">
      <div class="hover hover-1 text-white rounded"><img src="card_img/isuru.JPG" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">ISURU
            </span>ERANDA</h3>
          <p class="hover-1-description font-weight-light mb-0">Front end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
    <!-- DEMO 6 Item-->
    <div class="col-lg-4">
      <div class="hover hover-1 text-white rounded"><img src="card_img/dion.jpg" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">DION
            </span>LIYANAGE</h3>
          <p class="hover-1-description font-weight-light mb-0">Front end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
  </div><br>

  <div class="row">
    <!-- DEMO 7 Item-->
    <div class="col-lg-4 mb-3 mb-lg-0">
      <div class="hover hover-1 text-white rounded"><img src="card_img/WhatsApp Image 2023-12-03 at 12.56.51 PM.jpeg" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">YEHAN
            </span>RAVEESHA</h3>
          <p class="hover-1-description font-weight-light mb-0">Front end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href="https://instagram.com/yehan__raveesha?igshid=MmVlMjlkMTBhMg=="><i
                class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100080512270202&mibextid=zLoPMf"><i
                class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
    <!-- DEMO 8 Item-->
    <div class="col-lg-4">
      <div class="hover hover-1 text-white rounded"><img src="card_img/chanodya.jpg" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">CHANODYA
            </span>PRAVEEN</h3>
          <p class="hover-1-description font-weight-light mb-0">Front end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href="https://instagram.com/chanodyapraveen?utm_source=qr&igshid=MzNlNGNkZWQ4Mg=="><i class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href="https://www.facebook.com/chanodya.praveen.54?mibextid=ZbWKwL"><i class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
  </div><br>

  <div class="row">
    <!-- DEMO 9 Item-->
    <div class="col-lg-4 mb-3 mb-lg-0">
      <div class="hover hover-1 text-white rounded"><img src="card_img/thamidu.jpeg" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">THAMINDU
            </span>DHANOJA</h3>
          <p class="hover-1-description font-weight-light mb-0">Front end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
    <!-- DEMO 10 Item-->
    <div class="col-lg-4">
      <div class="hover hover-1 text-white rounded"><img src="card_img/shiraz.JPG" alt="">
        <div class="hover-overlay"></div>
        <div class="hover-1-content px-5 py-4">

          <h3 class="hover-1-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">SHIRAZ
            </span>SAPPIDEEN</h3>
          <p class="hover-1-description font-weight-light mb-0">Front end Developer</p>
          <p class="hover-1-description font-weight-light mb-0 mr-3">
            <a href=""><i class="fa-brands fa-github fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-instagram fa-xl" style="color: #f4f0f0;"></i></a>
            <a href=""><i class="fa-brands fa-facebook fa-xl" style="color: #f4f0f0;"></i></a>
          </p>
        </div>
      </div>
    </div>
  </div><br>



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


  <script src="about.js"></script>
</body>
</body>

</html>