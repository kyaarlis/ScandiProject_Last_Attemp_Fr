<?php
include "./db.php";
include "./main_functions.php";

// this php block Deletes items when Mass Delete button is clicked
if(isset($_POST["delete_products"])){
    
    if(isset($_POST['delete'])){
        foreach($_POST['delete'] as $sku){
        
             $query = "DELETE FROM products WHERE sku='".$sku."'";

             $product_delete_query = mysqli_query($conn, $query);
    
             confirm_query($product_delete_query);
         
             header('Location: http://localhost:8080');
        }
    }
}
