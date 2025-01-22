<?php
require_once 'server/connection.php';

$sql = "SELECT * FROM product_table";
$all_product = $conn->query($sql);
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
                    <img id="nav-logo" src="assets/imgs/Void_LOGO_removebg_Black_without.png" height="75px" alt="">
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
                        <a class="nav-link active" aria-current="page"><u>Home</u></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Collections.html">Collections</a>
                    </li>
                    <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Products</a>
                </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="orders.html">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
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
            <?php while ($row = mysqli_fetch_assoc($all_product)) { ?>
                <div class="one product col-lg-4 col-md-6 col-sm-6 center-div">
                    <img class="img-fluid" src="<?php echo $row["product_image"]; ?>" alt="">
                    <div class="details">
                        <h3><?php echo $row['product_name']; ?> </h3>
                        <p>Product Description</p>
                        <p> ₹ <?php echo $row['product_price']; ?> </p>
                        <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                    </div>
                </div>
            <?php } ?>
            <!-- --Two-- -->
            <!-- <div class="one product col-lg-4 col-md-6 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/2.jpg" alt="">
                <div class="details">
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>
            </div> -->
            <!-- --Three-- -->
            <!-- <div class="one product col-lg-4 col-md-6 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/3.jpg" alt="">
                <div class="details">
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>
            </div> -->
        </div>
    </section>



    <section id="featured" class="w-100">
        <article class="container center-div">
            <h3>Our Bestsellers</h3>
            <hr>
            <p>Here you can see our featured products</p>
        </article>
        <div class="row mx-auto container-fluid">
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/1.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <a href="single_product.html"><button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button></a>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/2.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/3.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/4.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

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


        <header class="container product-header py-3">
            <div>
                <h3>Anime Theme</h3>
            </div>
            <hr>
        </header>
        <div class="row mx-auto container-fluid">
            <div class="product one col-lg-3 col-md-4 col-sm-4 center-div">
                <img class="img-fluid" src="assets/imgs/1.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-4 center-div">
                <img class="img-fluid" src="assets/imgs/2.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/3.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/4.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/4.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
        </div>



        <header class="container py-3">
            <h3>Plain T-shirts</h3>
            <hr>
        </header>
        <div class="row mx-auto container-fluid">
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/1.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/2.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/3.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
            <div class="product one col-lg-3 col-md-4 col-sm-6 center-div">
                <img class="img-fluid" src="assets/imgs/4.jpg" alt="">
                <div class="details">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Product Name</h3>
                    <p>Product Description</p>
                    <p> ₹ 500</p>
                    <button class="newShopNowButton" role="button">Shop now <i class="fa-solid fa-bag-shopping"></i></button>
                </div>

            </div>
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





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>