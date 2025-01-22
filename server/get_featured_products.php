<?php

include 'connection.php';

$stmt = $conn->prepare("SELECT * FROM product_table LIMIT 1");

$stmt->execute();

$featured_products = $stmt->get_result();
