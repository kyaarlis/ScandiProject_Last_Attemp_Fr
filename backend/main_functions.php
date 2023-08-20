<?php

function confirm_query($result) {
    global $conn;

    if (!$result) {
        die ('Failed query!' . mysqli_error($conn));
    }
}

function allow_access_headers() {
    header("Access-Control-Allow-Origin: *"); // allow cross-origin resource sharing (CORS)
    header("Access-Control-Allow-Headers: *"); // allow all headers to be sent in the request
    header("Access-Control-Allow-Methods: *"); // allow all HTTP methods to be used
}