<?php
include "./db.php";
include "./main_functions.php";

allow_access_headers();

abstract class Product {
    protected $sku;
    protected $productName;
    protected $productType;
    protected $price;
                  
    public function setSku($sku) {
        $this->sku = $sku;
    }
         
    public function setProductName($productName) {
        $this->productName = $productName;
    }

    public function setProductType($productType) {
        $this->productType = $productType;
    }
         
    public function setPrice($price) {
        $this->price = $price;
    }

    abstract public function save();
}


class DVDProduct extends Product {
    protected $size;

    public function setAdditionalProperties($data) {
        $this->size = $data['size'];
    }

    public function save() {
        global $conn;
        
        $query = "INSERT INTO products (sku, name, price, productType, size) ";
        $query .= "VALUES ('{$this->sku}', '{$this->productName}', {$this->price}, '{$this->productType}', {$this->size})";

        $form_query = mysqli_query($conn, $query);
        confirm_query($form_query);
    }
}

class FurnitureProduct extends Product {
    protected $height;
    protected $width;
    protected $length;
    public function setAdditionalProperties($data) {
        $this->height = $data['height'];
        $this->width = $data['width'];
        $this->length = $data['length'];
    }

    public function save() {
        global $conn;
        
        $query = "INSERT INTO products (sku, name, price, productType, height, width, length) ";
        $query .= "VALUES ('{$this->sku}', '{$this->productName}', {$this->price}, '{$this->productType}', {$this->height}, {$this->width}, {$this->length})";

        $form_query = mysqli_query($conn, $query);
        confirm_query($form_query);
    }
}

class BookProduct extends Product {
    protected $weight;

    public function setAdditionalProperties($data) {
        $this->weight = $data['weight'];
    }

    public function save() {
        global $conn;
        
        $query = "INSERT INTO products (sku, name, price, productType, weight) ";
        $query .= "VALUES ('{$this->sku}', '{$this->productName}', {$this->price}, '{$this->productType}', {$this->weight})";

        $form_query = mysqli_query($conn, $query);
        confirm_query($form_query);
    }
}

class ProductTypeMapping {
    private static $productTypes = [
        'DVD' => 'DVDProduct',
        'Furniture' => 'FurnitureProduct',
        'Book' => 'BookProduct'
    ];

    public static function getClass($productType) {
        if (isset(self::$productTypes[$productType])) {
            return self::$productTypes[$productType];
        }
        throw new Exception("Invalid product type: " . $productType);
    }
}


if (isset($_POST['submitForm'])) {
    $productType = $_POST['productType'];

    // Get the class name from the factory mapping
    $className = ProductTypeMapping::getClass($productType);

    // Create a product using reflection
    $product = new $className();

    // Set properties
    $product->setSku($_POST['sku']);
    $product->setProductName($_POST['productName']);
    $product->setProductType($productType);
    $product->setPrice($_POST['price']);

    // Set specific properties using polymorphism
    $product->setAdditionalProperties($_POST);

    // Save the product using polymorphism
    $product->save();

    // Redirect after saving
    header('Location: http://localhost:8080/');
}