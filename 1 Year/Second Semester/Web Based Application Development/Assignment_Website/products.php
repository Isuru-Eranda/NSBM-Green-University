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
    $sql_delete_order = "DELETE FROM `renthub_orders` WHERE order_confirm='pending';";
    $result_delete_order = mysqli_query($conn,$sql_delete_order);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="icons/white.png">
  <title>Luxe Drive | Vehicles</title>
  <!-- Use the correct Bootstrap and Popper.js versions -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="products.css">
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
          <form action="" method="get">
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
  <nav class="navbar navbar-expand navbar-dark navbar-custom fixed-top nav-categories">
    <div class="container">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto">
        <li class='nav-item'><a class='nav-link nav-center' href='products.php'>All</a></li>
          <?php
              $sql_select_categories = "SELECT * FROM `renthub_categories`;";
              $result_categories = mysqli_query($conn, $sql_select_categories);

              if (mysqli_num_rows($result_categories) > 0) {
                  while ($category = mysqli_fetch_assoc($result_categories)) {
                      $category_id = $category['category_id'];
                      $category_name = $category['category_name'];

                      echo "<li class='nav-item'><a class='nav-link nav-center' href='products.php?category=$category_id'>$category_name</a></li>";
                  }
              }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!------------>

  <div class="products">
  <div class = "container">
            <?php
              $current_date = date('Y-m-d');
              if(!isset($_GET["category"]) && !isset($_GET["search_product"])){
                $sql_select_categories = "SELECT * FROM `renthub_categories`;";
                $result_categories = mysqli_query($conn, $sql_select_categories);

                if (mysqli_num_rows($result_categories) > 0) {
                    while ($category = mysqli_fetch_assoc($result_categories)) {
                        $category_id = $category['category_id'];
                        $category_name = $category['category_name'];

                        
                        $sql_select_products = "SELECT * FROM `renthub_products` WHERE category_id=$category_id && status='true';";
                        $result_products = mysqli_query($conn, $sql_select_products);

                        if (mysqli_num_rows($result_products) > 0) {
                          echo "<h1 class='h1 text-center text-dark pageHeaderTitle'>$category_name</h1>";
                          while ($product = mysqli_fetch_assoc($result_products)) {
                              $product_id = $product['product_id'];
                              $product_name = $product['product_name'];
                              $product_image = $product['product_image'];
                              $product_price = $product['product_price'];
                              $product_desc = $product['product_desc'];
                              $product_status = $product['status'];
                              
          
                              echo "<article class='card dark blue'>
                              <a class='card__img_link' href='#'>
                                  <img class='card__img' src='admin_panel/includes/product_images/$product_image' alt=$product_name />
                              </a>
                              <div class='card__text'>
                                  <h1 class='card__title blue'><a href='#'>$product_name</a></h1>
                                  
                                  <div class='card__bar'></div>
                                  <div class='card__preview-txt'>$product_desc</div>
                                  <div class='price'> Rs. $product_price/day</div>
                                  <ul class='card__tagbox'>
                                      <form action='checkout.php' method='post'>
                                      <li class='tag__item'>
                                      <input type='date' id='from$product_id' name='from' min='$current_date' required>
                                      <i class='fa-solid fa-minus'></i>
                                      <input type='date' id='to$product_id' name='to' min='$current_date' required>
                                      <input type='submit' id='submit$product_id' name='book' value='$product_id' style='display: none'>
                                      </li>
                                      </form>
                                      <li class='tag__item play blue'>
                                          <label for='submit$product_id' class='sbm_btn'>Hire Now</label>
                                      </li>
                                  </ul>
                              </div>
                          </article>";
                          echo "<script>
                            document.getElementById('from$product_id').addEventListener('input', function () {
                              document.getElementById('to$product_id').min = this.value;
                            });
                          </script>";
                          }
                      }
                    }
                }
              } elseif(isset($_GET["category"])) {
                $category_id = $_GET["category"];
                $sql_select_categories = "SELECT * FROM `renthub_categories` WHERE category_id=$category_id;";
                $sql_select_products = "SELECT * FROM `renthub_products` WHERE category_id=$category_id;";
                $result_products = mysqli_query($conn, $sql_select_products);
                $result_categories = mysqli_query($conn, $sql_select_categories);

                if (mysqli_num_rows($result_products) > 0) {
                  $category = mysqli_fetch_assoc($result_categories);
                  $category_name = $category["category_name"];
                  echo "<h1 class='h1 text-center text-dark pageHeaderTitle'>$category_name</h1>";
                  while ($product = mysqli_fetch_assoc($result_products)) {
                      $product_id = $product['product_id'];
                      $product_name = $product['product_name'];
                      $product_image = $product['product_image'];
                      $product_price = $product['product_price'];
                      $product_desc = $product['product_desc'];
                      $product_status = $product['status'];
  
                      echo "<article class='card dark blue'>
                              <a class='card__img_link' href='#'>
                                  <img class='card__img' src='admin_panel/includes/product_images/$product_image' alt=$product_name />
                              </a>
                              <div class='card__text'>
                                  <h1 class='card__title blue'><a href='#'>$product_name</a></h1>
                                  
                                  <div class='card__bar'></div>
                                  <div class='card__preview-txt'>$product_desc</div>
                                  <div class='price'> Rs. $product_price/day</div>
                                  <ul class='card__tagbox'>
                                      <form action='checkout.php' method='post'>
                                      <li class='tag__item'>
                                      <input type='date' id='from$product_id' name='from' min='$current_date' required>
                                      <i class='fa-solid fa-minus'></i>
                                      <input type='date' id='to$product_id' name='to' min='$current_date' required>
                                      <input type='submit' id='submit$product_id' name='book' value='$product_id' style='display: none'>
                                      </li>
                                      </form>
                                      <li class='tag__item play blue'>
                                          <label for='submit$product_id' class='sbm_btn'>Hire Now</label>
                                      </li>
                                  </ul>
                              </div>
                          </article>";
                          echo"
                          <script>
                          document.getElementById('from$product_id').addEventListener('input', function () {
                            document.getElementById('to$product_id').min = this.value;
                          });
                          </script>";
                  }
              }
              } elseif(isset($_GET["search_product"])) {
                $search_product = $_GET["search_product"];
                $sql_select_products = "SELECT * FROM `renthub_products` WHERE product_keywords like '%$search_product%';";
                $result_products = mysqli_query($conn, $sql_select_products);

                if (mysqli_num_rows($result_products) > 0) {
                  echo "<h1 class='h1 text-center text-dark pageHeaderTitle'>Searched for: $search_product</h1>";
                  while ($product = mysqli_fetch_assoc($result_products)) {
                      $product_id = $product['product_id'];
                      $product_name = $product['product_name'];
                      $product_image = $product['product_image'];
                      $product_price = $product['product_price'];
                      $product_desc = $product['product_desc'];
                      $product_status = $product['status'];
  
                      echo "<article class='card dark blue'>
                              <a class='card__img_link' href='#'>
                                  <img class='card__img' src='admin_panel/includes/product_images/$product_image' alt=$product_name />
                              </a>
                              <div class='card__text'>
                                  <h1 class='card__title blue'><a href='#'>$product_name</a></h1>
                                  
                                  <div class='card__bar'></div>
                                  <div class='card__preview-txt'>$product_desc</div>
                                  <div class='price'> Rs. $product_price/day</div>
                                  <ul class='card__tagbox'>
                                      <form action='checkout.php' method='post'>
                                      <li class='tag__item'>
                                      <input type='date' id='from$product_id' name='from' min='$current_date' required>
                                      <i class='fa-solid fa-minus'></i>
                                      <input type='date' id='to$product_id' name='to' min='$current_date' required>
                                      <input type='submit' id='submit$product_id' name='book' value='$product_id' style='display: none'>
                                      </li>
                                      </form>
                                      <li class='tag__item play blue'>
                                          <label for='submit$product_id' class='sbm_btn'>Hire Now</label>
                                      </li>
                                  </ul>
                              </div>
                          </article>";
                          echo"
                          <script>
                          document.getElementById('from$product_id').addEventListener('input', function () {
                            document.getElementById('to$product_id').min = this.value;
                          });
                          </script>";
                  }
                }
              }
            ?> 
  </div>
  </div>

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

</body>

</html>