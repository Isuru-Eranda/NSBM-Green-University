<?php
    session_start();
    if(!isset($_SESSION['user_email'])) {
      header("Location: login.php");
      exit();
    }
    /*
    session_unset();
    session_destroy();
    */

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
    $user_email = $_SESSION['user_email'];
    $sql_select_user = "SELECT * FROM `renthub_users` WHERE user_email='$user_email';";
    $result_select_user = mysqli_query($conn,$sql_select_user);
    $row_select_user = mysqli_fetch_assoc($result_select_user);
    $user_id = $row_select_user['user_id'];
    

    if(isset($_POST['book']) && isset($_POST['to']) && isset($_POST['from'])) {
      $product_id = $_POST['book'];
      $from_date = $_POST['from'];
      $to_date = $_POST['to'];

      $user_firstname = $row_select_user["user_firstname"]; 
      $user_lastname = $row_select_user["user_lastname"]; 
      $user_contact = $row_select_user["user_contact"];
      $user_address = $row_select_user["user_address"];
      $user_address_city = $row_select_user["user_address_city"];
      $user_address_state = $row_select_user["user_address_state"];

      $order_invoice = mt_rand();
      $order_status = "pending";
      $order_payment = "false";
      
      $validated_from_date = date('Y-m-d', strtotime($from_date));
      $validated_to_date = date('Y-m-d', strtotime($to_date));

      $from_date_time = new DateTime($validated_from_date);
      $to_date_time = new DateTime($validated_to_date);

      $date_difference = $from_date_time->diff($to_date_time)->format('%a');
    

      $total_price = 0;

      $sql_select_product = "SELECT product_price FROM `renthub_products` WHERE product_id = '$product_id'";
      $result_select_product = mysqli_query($conn, $sql_select_product);
      $row_select_product = mysqli_fetch_assoc($result_select_product);
      $product_price = $row_select_product["product_price"];

      $total_price = $product_price * ($date_difference + 1) * 115/100;
      
      $sql_insert_order = "INSERT INTO `renthub_orders` (user_id,product_id,order_invoice,order_status,order_from,order_to,order_duration,order_amount,order_additional_charges,order_payment,order_date,delivery_firstname,delivery_lastname,delivery_address,delivery_address_state,delivery_address_city,delivery_contact,order_confirm) VALUES ($user_id,$product_id,$order_invoice,'$order_status','$validated_from_date','$validated_to_date',$date_difference + 1,$total_price,0,'$order_payment',NOW(),'$user_firstname','$user_lastname','$user_address','$user_address_state','$user_address_city','$user_contact','pending')";
      $result_insert_order = mysqli_query($conn, $sql_insert_order);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="icons/white.png">
  <title>Luxe Drive | Checkout</title>
  <!-- Use the correct Bootstrap and Popper.js versions -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="checkout.css">
  <script src="https://kit.fontawesome.com/d5f76a1949.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
          <a href='user_area/index.php' class='nav-icon'><i class="fa-solid fa-user" style="color: #f4f0f0;"></i></a>
        </div>
      </div>
    </div>
  </nav>

  <!------------>

  <section class="home">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
          <?php
              $sql_select_order = "SELECT * FROM `renthub_orders` WHERE user_id=$user_id && order_confirm='pending';";
              $result_select_order = mysqli_query($conn, $sql_select_order);
              $row_select_order = mysqli_fetch_assoc($result_select_order);
              $product_id = $row_select_order["product_id"];
              $current_date = date('Y-m-d');
              $order_from = $row_select_order["order_from"];
              $order_to = $row_select_order["order_to"];
              $order_duration = $row_select_order["order_duration"];
              $order_amount = $row_select_order["order_amount"];
              $delivery_firstname = $row_select_order["delivery_firstname"];
              $delivery_lastname = $row_select_order["delivery_lastname"];
              $delivery_address = $row_select_order["delivery_address"];
              $delivery_address_state = $row_select_order["delivery_address_state"];
              $delivery_address_city = $row_select_order["delivery_address_city"];
              $delivery_contact = $row_select_order["delivery_contact"];

              $sql_select_product = "SELECT * FROM `renthub_products` WHERE product_id=$product_id";
              $result_select_product = mysqli_query($conn, $sql_select_product);
              $row_select_product = mysqli_fetch_assoc($result_select_product);
              $product_name = $row_select_product['product_name'];
              $product_image = $row_select_product['product_image'];
              $product_price = $row_select_product['product_price'];
              ?>
            <div class="row" id="main">
              <form action="" method="post" id="date">
                  <div class="my-3">
                      <label for="product_name" class="form-label">Vehical:</label>
                      <input type="text" id="product_name" name="product_name" value="<?php echo $product_name;?>" class="form-control" required disabled>
                  </div>
                  <div class="my-3">
                      <img src="admin_panel/includes/product_images/<?php echo $product_image; ?>" width="100%">
                  </div>
                  <div class="row mb-3 mt-3">
                      <div class="col-md-4">
                          <label for="order_from" class="form-label">Pickup Date:</label>
                          <input type="date" id="order_from" name="order_from" min="<?php echo $current_date;?>" value="<?php echo $order_from;?>" class="form-control" required>
                      </div>

                      <div class="col-md-4">
                          <label for="order_to" class="form-label">Return Date:</label>
                          <input type="date" id="order_to" name="order_to" min="<?php echo $order_from;?>" value="<?php echo $order_to;?>" class="form-control" required>
                      </div>
                      <div class="col-md-4">
                          <label for="order_duration" class="form-label">Number of Days:</label>
                          <input type="number" id="order_duration" name="order_duration" value="<?php echo $order_duration;?>" class="form-control" required disabled>
                      </div>
                  </div>
                  <input type="submit" id="submit-date" name="submit" value="submit" style="display: none"/>
              </form>
            <form action="orders.php" method="post">
                  <div class="row mb-3 mt-3">
                      <div class="col-md-6">
                          <label for="firstname" class="form-label">First Name:</label>
                          <input type="text" id="firstname" name="delivery_firstname" value="<?php echo $delivery_firstname;?>" class="form-control" required>
                      </div>

                      <div class="col-md-6">
                          <label for="lastname" class="form-label">Last Name:</label>
                          <input type="text" id="lastname" name="delivery_lastname" value="<?php echo $delivery_lastname;?>" class="form-control" required>
                      </div>
                  </div>

                  <div class="mb-3">
                      <label for="address" class="form-label">Address:</label>
                      <input type="text" id="address" name="delivery_address" value="<?php echo $delivery_address;?>" class="form-control" required>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="addressstate" class="form-label">State:</label>
                          <input type="text" id="addressstate" name="delivery_address_state" value="<?php echo $delivery_address_state;?>" class="form-control" required>
                      </div>

                      <div class="col-md-6">
                          <label for="addresscity" class="form-label">City:</label>
                          <input type="text" id="addresscity" name="delivery_address_city" value="<?php echo $delivery_address_city;?>" class="form-control" required>
                      </div>
                  </div>

                  <div class="mb-3">
                      <label for="contact" class="form-label">Contact No:</label>
                      <input type="text" id="contact" name="delivery_contact" value="<?php echo $delivery_contact;?>" class="form-control" required>
                  </div>
                  <input type="submit" id="submit-form" name="submit" value="submit" style="display: none"/>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            
            <div class="bottom">
              <div class="right">
              <div class="price-container">
                  Sub Total:
                  <div class="price">Rs.
                      <?php
                          echo $order_amount - ($order_amount * 15/115);
                      ?>
                    </div>
                </div>
                <div class="price-container">
                  VAT: 
                  <div class="price">Rs. 
                    <?php
                      echo ($order_amount * 100/115) * 15/100;
                    ?> 
                  </div>
                </div>
                <div class="price-container">
                  Total: 
                  <div class="price">Rs. <?php echo $order_amount;?> </div>
                </div>
                <div class="buttons">
                  <a href="https://www.paypal.com" target="_blank" class="btn btn-custom">Pay Now</a>
                  <label for="submit-form" tabindex="0" class="btn btn-custom">Pay Later</label>
                </div>
              </div>
            </div>
            <div class="tac">
            <div class="head">TERMS AND CONDITIONS</div>
                <ul>
                  <li>Payment: Rental + Refundable Deposit in advance or on invoice.</li>
                  <li>Minimum Mileage: 80 kms per day as above</li>
                  <li>Rates Subject to Change</li>
                  <li>Driver Extras:Rs.300/hr (Rs. 1000 for Luxury car) after 8 hr.Night out Rs. 300/-. For bus-Crew Batta Rs. 300 for 8 hrs. Detention Rs. 300/hr.</li>
                  <li>Driver Gratuity/ Tips: Recommended at client's discretion</li>
                  <li>Driver Meals + Accommodation. Rs. 4000 (Rs. 5000 for bus) per day if client does not provide.</li>
                  <li>Driver Meals + Accommodation. Rs. 5500 FOR NORTH AND EAST (For All Vehicles)</li>
                  <li>Taxes will be added (15% VAT)</li>
                  <li>Charges are subject to changes due to increase of fuel price and Taxes.</li>
                  <li>Cancellation charges: A days rental or 25% of the total (Whichever is greater). Can be carried forward a credit for our services at a later date.</li>
                  <li>Subject to a 10% Seasonal Surcharges during busy months.</li>
                </ul>
            </div>

          </div>
        </div>
      </div>  
    </div>
  </section>

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
  <script>

    const fromDateInput = document.getElementById('order_from');
    const toDateInput = document.getElementById('order_to');
    const submitButton = document.getElementById('submit-date');

    fromDateInput.addEventListener('input', function () {
      toDateInput.min = this.value;
      submitButton.click();
    });

    toDateInput.addEventListener('input', function () {
      submitButton.click();
    });
  </script>
  
</body>
</html>

<?php
if(isset($_POST['order_from']) && isset($_POST['order_to'])){
  $order_from = $_POST['order_from'];
  $order_to = $_POST['order_to'];
  $validated_order_from = date('Y-m-d', strtotime($order_from));
  $validated_order_to = date('Y-m-d', strtotime($order_to));
  $order_from_time = new DateTime($validated_order_from);
  $order_to_time = new DateTime($validated_order_to);

  $date_difference= $order_from_time->diff($order_to_time)->format('%a');

  $total_price = $product_price * ($date_difference + 1) + 300;

  $sql_update_order = "UPDATE `renthub_orders` SET order_from='$validated_order_from',order_to='$validated_order_to',order_duration=$date_difference + 1,order_amount=$total_price WHERE user_id='$user_id' AND order_confirm='pending';";
  $result_update_order = mysqli_query($conn, $sql_update_order);
  echo "<script>window.location.href = 'checkout.php'</script>";
}
?>