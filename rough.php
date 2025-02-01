<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    if (isset($_POST['table_name'])) {
        $allowed_tables = ['product_table', 'bestsellers', 'new_arrivals', 'anime'];
        $table_name = $_POST['table_name'];

        if (!in_array($table_name, $allowed_tables)) {
            die("Invalid table selection.");
        }
    } else {
        die("Table name not selected.");
    }

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];

    $target_dir = "uploads/";

    $image_paths = [];
    for ($i = 1; $i <= 5; $i++) {
        $image_key = "product_image" . $i;
        if (!empty($_FILES[$image_key]['name'])) {
            $target_file = $target_dir . basename($_FILES[$image_key]["name"]);
            move_uploaded_file($_FILES[$image_key]["tmp_name"], $target_file);
            $image_paths[] = $target_file;
        } else {
            $image_paths[] = NULL;
        }
    }

    $query = "INSERT INTO `$table_name` (product_name, product_price, product_description, product_image, product_image2, product_image3, product_image4, product_image5) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdssssss", $product_name, $product_price, $product_description, $image_paths[0], $image_paths[1], $image_paths[2], $image_paths[3], $image_paths[4]);

    if ($stmt->execute()) {
        echo "Product uploaded successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
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






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>