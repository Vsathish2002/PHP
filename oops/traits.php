<?php
trait Logger {
    public function log($msg) {
        echo "Log: $msg<br>";
    }
}

class User {
    use Logger; // include trait
}

class Product {
    use Logger; // include trait
}

$user = new User();
$user->log("User created"); // Log: User created

$product = new Product();
$product->log("Product added"); // Log: Product added

?>