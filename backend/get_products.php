<?php
include "./db.php";
include "./main_functions.php";

function get_products() {
    global $conn;

    header("Access-Control-Allow-Origin: *"); // allow cross-origin resource sharing (CORS)
    header("Access-Control-Allow-Headers: *"); // allow all headers to be sent in the request
    header("Access-Control-Allow-Methods: *"); // allow all HTTP methods to be used

    $query = "SELECT * FROM products ORDER BY id ASC";
        
    $product_query = mysqli_query($conn, $query);

    confirm_query($product_query);

    while ($product = mysqli_fetch_assoc($product_query)) {
        $products[] = $product;  
    } 
    echo json_encode($products);
}

get_products();