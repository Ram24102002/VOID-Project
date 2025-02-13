<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "void_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$cart = $conn->query("SELECT * FROM cart");



$target_dir = "uploads/";

// Ensure the uploads folder exists
if (!is_dir($target_dir)) {
  mkdir($target_dir, 0777, true);
}

$image_paths = [];
for ($i = 1; $i <= 5; $i++) {
  $image_key = "product_image" . $i;
  if (!empty($_FILES[$image_key]['name'])) {
    $target_file = $target_dir . basename($_FILES[$image_key]["name"]);

    // Debugging messages
    echo "Trying to upload: " . $_FILES[$image_key]['name'] . "<br>";
    echo "Temporary file location: " . $_FILES[$image_key]['tmp_name'] . "<br>";

    if (move_uploaded_file($_FILES[$image_key]["tmp_name"], $target_file)) {
      echo "Upload successful!<br>";
      $image_paths[] = $target_file;
    } else {
      echo "Upload failed for " . $_FILES[$image_key]['name'] . "<br>";
      echo "Error code: " . $_FILES[$image_key]['error'] . "<br>";
      $image_paths[] = NULL;
    }
  } else {
    $image_paths[] = NULL;
  }
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="assets/imgs/Void_LOGO_Removebg_HD_fullsuze.png" type="image/x-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="assets/css/style.css">
  <title>VOID - Fashion Brand</title>
</head>

<body>





  <!---  Navbar ------------------------------------------------------------------------------------------------------------------------- -->

  <nav class="navbar navbar-expand-lg d-flex  py-3">
    <div class="container d-flex">

      <aside class="navbar-brand-aside d-flex">
        <div class="center-div">
          <img id="nav-logo" src="assets/imgs/Void_LOGO_removebg_Black_without.png" alt="">
          <a class="navbar-brand mb-0" href="#">VOID</a>
        </div>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa-solid fa-bars"></i>
        </button>
      </aside>



      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- <form class="d-flex me-auto center-div" id="searchBarForm" role="search">
                    <input class="form-control me-2" id="searchBar" type="search" placeholder="Anime" aria-label="Search">
                    <button class="btn btn-outline-dark searchSubmit" type="submit">Search</button>
                  </form> -->


        <ul class="navbar-nav nav-buttons me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Collections.html">Collections</a>
          </li>
          <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Products</a>
                </li> -->
          <li class="nav-item">
            <a class="nav-link" href="">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" aria-current="page"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-user"></i></i></a>
          </li>

          <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li> 
                <li class="nav-item">
                  <a class="nav-link disabled" aria-disabled="true">About</a>
                </li>-->
        </ul>


      </div>





    </div>
  </nav>


  <!----------------------------------------------------------------------------------------------------------------------------   Navbar -->



  <!-- Cart -------------------------------- -->

  <section class="cart container  py-3">
    <div class="container mt-5">
      <h2 class="font-weight-bold"> Your Cart</h2>
      <hr>
    </div>

    <?php if ($cart && $cart->num_rows > 0): ?>
      <?php while ($row = $cart->fetch_assoc()): ?>
        <table>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
          <tr>
            <td>
              <div class="product-info">
                <img class="img-fluid" src="<?php echo $row['product_image']; ?>" alt="">
                <div class="product-details">
                  <p><?php echo $row['product_name']; ?></p>
                  <small><span>₹</span><?php echo $row['product_price']; ?></small>
                  <br>
                  <a href="" class="cart-remove-btn"><u>Remove</u></a>
                </div>
              </div>
            </td>
            <td>
              <input type="text" value="1" />
              <!-- <a href="">Edit</a> -->
            </td>
            <td>
              <span>₹</span>
              <p class="product-price"><?php echo $row['product_price']; ?></p>
            </td>
          </tr>
        </table>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No products in Cart</p>
    <?php endif; ?>

    <div class="cart-total">
      <table>
        <tr>
          <td>Subtotal</td>
          <td><span>₹</span>
            <p id="cart-total"></p>
          </td>
        </tr>
        <tr>
          <td>Shipping</td>
          <td><span>₹</span></td>
        </tr>
        <tr>
          <td>Total</td>
          <td><span>₹</span></td>
        </tr>
      </table>
    </div>


    <div class="checkout-container">
      <button class="btn btn-dark">Checkout</button>
    </div>


  </section>






  <footer>
    <div class="col-lg-9 center-div">
      <img class="footer-img" src="assets/imgs/Void_LOGO_removebg_Black.png" alt="">
      <p>VOID</p>
    </div>

    <div class="col-lg-3">
      <ul>
        <li><a href="">Amazon <i class="fa-brands fa-amazon"></i></a></li>
        <li><a href="">Flipkart <i class="fa-sharp-duotone fa-solid fa-cart-shopping"></i></a></li>
        <li><a href="mailto:">Email <i class="fa-solid fa-envelope"></i></a></li>
        <li><a href="">Instagram <i class="fa-brands fa-square-instagram"></i></a></li>
        <li><a href="">Twitter <i class="fa-brands fa-twitter"></i></a></li>
        <li><a href="">Youtube <i class="fa-brands fa-youtube"></i></a></li>
      </ul>
    </div>

  </footer>




  <script src="assets/js/cart.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>