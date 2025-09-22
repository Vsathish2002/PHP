<?php
class Product {
    public $name;
    public $price;

    public function auto() {
        echo "$this->name costs $this->price<br>";
    }
}

class Book extends Product {
    public $author;

    public function info() {
        echo "$this->name by $this->author costs $this->price<br>";
    }
}

$book = new Book();
$book->name = "PHP for Beginners";
$book->author = "John Doe";
$book->price = 500;
$book->info();


?>