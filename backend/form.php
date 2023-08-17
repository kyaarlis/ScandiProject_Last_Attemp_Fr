<?php
include "./db.php";
include "./main_functions.php";

header("Access-Control-Allow-Origin: *"); // allow cross-origin resource sharing (CORS)
header("Access-Control-Allow-Headers: *"); // allow all headers to be sent in the request
header("Access-Control-Allow-Methods: *"); // allow all HTTP methods to be used

if (isset($_POST['submitForm'])) {
    $sku = $_POST['sku'];
    $productName = $_POST['productName'];
    $productType = $_POST['productType'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];
    $weight = $_POST['weight'];

    
    $size = isset($_POST['size']) ? $_POST['size'] : null;
	$height = isset($_POST['height']) ? $_POST['height'] : null;
	$width = isset($_POST['width']) ? $_POST['width'] : null;
	$length = isset($_POST['length']) ? $_POST['length'] : null;
	$weight = isset($_POST['weight']) ? $_POST['weight'] : null;

    check_for_duplicate($sku);

    if ($productType === 'DVD') {

        $query = "INSERT INTO products (sku, name, price, productType, size) ";
        $query .= "VALUES ('{$sku}', '{$productName}', {$price}, '{$productType}', {$size})";
        
    } else if ($productType === 'Furniture') {

        $query = "INSERT INTO products (sku, name, price, productType, height, width, length) ";
        $query .= "VALUES ('{$sku}', '{$productName}', {$price}, '{$productType}', {$height}, {$width}, {$length})";

    } else if ($productType === 'Book') {

        $query = "INSERT INTO products (sku, name, price, productType, weight) ";
        $query .= "VALUES ('{$sku}', '{$productName}', {$price}, '{$productType}', {$weight})";
    }
  
    $form_query = mysqli_query($conn, $query);

    confirm_query($form_query);

    header('Location: http://localhost:8080/');
}