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
$new_arrivals = $conn->query("SELECT * FROM new_arrivals");
$bestseller_table = $conn->query("SELECT * FROM bestsellers_product");
$product_table = $conn->query("SELECT * FROM product_table");
$page_images =  $conn->query("SELECT * FROM page_images");



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
                    <img id="nav-logo" src="assets/imgs/Void_LOGO_Removebg_HD_fullsuze.png" alt="">
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
                        <a class="nav-link " aria-current="page"><u>Home</u></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Collections.php">Collections</a>
                    </li>
                    <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Products</a>
                </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="orders.html">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account.html"><i class="fa-solid fa-user"></i></i></a>
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


    <!---  Home ------------------------------------------------------------------------------------------------------------------------- -->

    <section class="Home-Hero center-div">

        <aside class="homeHero-left container center-div ">
            <div>
                <article class="GBL center-div">
                    <ul class="txt">
                        <li>..</li>
                        <li>..</li>
                        <li>Limits</li>
                        <li>Beyond</li>
                        <li>Go</li>
                </article>
                <h5>NEW ARRIVALS</h5>
                <h1><span>Best Price</span> This Season</h1>
                <p>VOID offers the best products for the most affordable Price</p>
                <button class="heroShopnow">Shop now</button>
                <!-- <p>Go Beyond Limits</p> -->

            </div>
        </aside>
        <aside class="homeHero-right center-div">
            <img src="assets/imgs/hero_img.png" alt="">
        </aside>

    </section>

    <!----------------------------------------------------------------------------------------------------------------------------   Home -->


    <!-- --- New Arrivals -------------------------------------------------------------------------------------------------------------- -->

    <section id="new" class="w-100">
        <header class="new-header center-div">
            <h1>New Arrivals</h1>
        </header>
        <hr class="mx-auto hr-100">
        <div class=" row py-5 my-2">





            <!-- --One-- -->
            <?php if ($new_arrivals && $new_arrivals->num_rows > 0): ?>
                <?php while ($row = $new_arrivals->fetch_assoc()): ?>
                    <div class="one product col-lg-3 col-md-6 col-sm-6 center-div">
                        <div class="card">
                            <img class="img-fluid" src="<?php echo $row['product_image']; ?>" alt="">

                            <div class="details">
                                <h4><?php echo $row['product_name']; ?> </h4>
                                <div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p><?php echo $row['product_description']; ?> </p>
                                <p> ₹ <?php echo $row['product_price']; ?> </p>
                                <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No products found in the database.</p>
            <?php endif; ?>
        </div>
        </div>
    </section>









    <!-- Banner----------------------------------------------------------- -->


    <section id="banner">
        <div class="container">
            <h4>Mid Season's Sale</h4>
            <h1>New Collections <br> UP to 30% OFF</h1>
            <button class="heroShopnow">Shop now</button>
        </div>

    </section>





    <!-- Collections----------------------------------------------------------- -->


    <section id="Collections" class="w-100">
        <article class="container center-div">
            <h1 class="py-5">Our Collections</h1><br>
        </article>
        <hr class="mx-auto hr-100">





        <section id="featured" class="w-100">
            <article class="container center-div">
                <h3>Our Bestsellers</h3>
                <hr>
                <p>Here you can see our featured products</p>
            </article>
            <div class="row mx-auto container-fluid">
                <?php if ($bestseller_table && $bestseller_table->num_rows > 0): ?>
                    <?php while ($row = $bestseller_table->fetch_assoc()): ?>
                        <div class="one product col-lg-3 col-md-6 col-sm-6 center-div">
                            <div class="card">
                                <img class="img-fluid" src="<?php echo $row['product_image']; ?>" alt="">

                                <div class="details">
                                    <h4><?php echo $row['product_name']; ?> </h4>
                                    <div>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p><?php echo $row['product_description']; ?> </p>
                                    <p> ₹ <?php echo $row['product_price']; ?> </p>
                                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No products found in the database.</p>
                <?php endif; ?>

            </div>
        </section>





        <section class="anime-collection-banner">
            <article class="container anime-banner-inner">
                <h1 class="py-5">We have the Best <br> <span>Anime</span> Collections</h1><br>
            </article>
        </section>


        <header class="container product-header py-3">
            <div>
                <h3>Anime Theme</h3>
            </div>
            <hr>
        </header>
        <div class="row mx-auto container-fluid">
            <?php if ($product_table && $product_table->num_rows > 0): ?>
                <?php while ($row = $product_table->fetch_assoc()): ?>
                    <div class="one product col-lg-3 col-md-6 col-sm-6 center-div">
                        <div class="card">
                            <img class="img-fluid" src="<?php echo $row['product_image']; ?>" alt="">

                            <div class="details">
                                <h4><?php echo $row['product_name']; ?> </h4>
                                <div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p><?php echo $row['product_description']; ?> </p>
                                <p> ₹ <?php echo $row['product_price']; ?> </p>
                                <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No products found in the database.</p>
            <?php endif; ?>
        </div>
    </section>



    <footer>
        <div class="col-lg-9 center-div">
            <img class="footer-img" src="assets/imgs/Void_LOGO_Removebg_HD_fullsuze.png" alt="">
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





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>