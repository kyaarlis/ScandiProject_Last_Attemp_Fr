<?php

function confirm_query($result) {
    global $conn;

    if (!$result) {
        die ('Failed query!' . mysqli_error($conn));
    }
}

function check_for_duplicate($item) {
    global $conn;

    $query = "SELECT sku FROM products";

    $check_query = mysqli_query($conn, $query);

    confirm_query($check_query);

    $duplicateFound = false;

    while ($row = mysqli_fetch_assoc($check_query)) {
        $db_item = $row['sku'];

        if ($db_item === $item) {
            $duplicateFound = true;
            break; // Exit the loop once a duplicate is found
        }
    }

    if ($duplicateFound) {
        $message = "Only Unique SKU's allowed, duplicate found!";
        header('Location: http://localhost:8080/addproduct?message=' . urlencode($message));
    }
}