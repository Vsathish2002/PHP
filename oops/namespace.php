<?php
require 'LibraryA.php';
require 'LibraryB.php';

// Method 1: Full namespace
$a = new \LibraryA\User();
$b = new \LibraryB\User();

echo $a->info(); 
echo "<br>";
echo $b->info();  

//Method 2: Using "use" + alias
use LibraryA\User as UserA;
use LibraryB\User as UserB;

$a2 = new UserA();
$b2 = new UserB();

echo "<br>" . $a2->info();  
echo "<br>" . $b2->info();  
?>