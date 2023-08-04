<?php

function confirm_query($result) {
    global $conn;

    if (!$result) {
        die ('Failed query!' . mysqli_error($conn));
    }
}

// function get_product($productType) {
//     global $conn;

//     header("Access-Control-Allow-Origin: *"); // allow cross-origin resource sharing (CORS)
//     header("Access-Control-Allow-Headers: *"); // allow all headers to be sent in the request
//     header("Access-Control-Allow-Methods: *"); // allow all HTTP methods to be used

//     $query = "SELECT * FROM products WHERE productType = '$productType'";
//     $query .= " ORDER BY id ASC";
        
//     $product_query = mysqli_query($conn, $query);

//     confirm_query($product_query);

//     while ($product = mysqli_fetch_assoc($product_query)) {
//         $products[] = $product;  
//     } 
//     echo json_encode($products);
// }