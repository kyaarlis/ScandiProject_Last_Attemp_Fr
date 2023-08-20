<?php
include "./db.php";
include "./main_functions.php";

function get_products() {
    global $conn;

    allow_access_headers();

    $query = "SELECT * FROM products ORDER BY id ASC";
        
    $product_query = mysqli_query($conn, $query);

    confirm_query($product_query);

    $products = [];

    while ($product = mysqli_fetch_assoc($product_query)) {
        $products[] = $product;  
    } 
    echo json_encode($products);
}

get_products();