<?php
include "./db.php";
include "./main_functions.php";

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

    header('Location: http://localhost:8080');
}