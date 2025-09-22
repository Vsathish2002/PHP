<?php
// class Calculator {
//     public function add($a, $b, $c = 0) {
//         return $a + $b + $c;
//     }
// }
// $calc = new Calculator();
// echo $calc->add(5, 10);    
// echo $calc->add(5, 10, 20); 

class Animal {
    public function sound() {
        echo "Some sound<br>";
    }
}

class Dog extends Animal {
    public function sound() {
        echo "Bark!<br>";
    }
}

class Cat extends Animal {
    public function sound() {
        echo "Meow!<br>";
    }
}

$animals = [new Dog(), new Cat(), new Animal()];
foreach ($animals as $a) {
    $a->sound(); // same method, different output
}

?>