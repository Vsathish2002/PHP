<?php
// echo "Hello, PHP World!  ";

// $x = 5;
// var_dump($x);
// var_dump(5);
// var_dump("John");
// var_dump(3.14);
// var_dump(true);
// var_dump([2, 3, 56]);
// var_dump(NULL);



// $x = 5; // global scope

// function myTest() {
//   // using x inside this function will generate an error
//   echo "<p>Variable x inside function is: $x</p>";
// }
// myTest();

// echo "<p>Variable x outside function is: $x</p>";


// $txt1 = "Learn PHP";
// print "<h2>$txt1</h2>";
// echo '<h2>' . $txt1 . '</h2>';


//Conditon operators
//1.If-Else 
// $age=1;
// if($age>18){
//     echo "<h2>Valid to vote</h2>";
// }
// else{
//     echo "<h2>NOt valid to vote</h2>";
// }

//or

// $age=23;
// if($age>18) echo "<h2>Valid to vote</h2>"; 
// else echo "<h2>NOt valid to vote</h2>";

//or use ternary operator
// $age=21;
// $b=$age>18 ? "Valid to vote": "NO valid to vote";
// echo $b;


//2.If-elif -else
// $mark=35;

// if($mark>90){
//     echo "Pass";
// }
// elseif($mark>50){
//     echo "Average";
// }
// elseif($mark>35 || $mark==35){
//     echo "Just Pass";
// }
// else{
//     echo "fail";
// }

// 3.Switch 
// $favcolor = "green";

// switch ($favcolor) {
//   case "red":
//     echo "Your favorite color is red!";
//     break;
//   case "blue":
//     echo "Your favorite color is blue!";
//     break;
//   case "green":
//     echo "Your favorite color is green!";
//     break;
//   default:
//     echo "Your favorite color is neither red, blue, nor green!";
// }


//Loops
//1.While Loops  //Stop when the condition is false.
// $i = 1;
// while ($i < 6) {
//   echo $i;
//   $i++;
// }

//2.do while
// $i = 1;

// do {
//   echo $i;
//   $i++;
// } while ($i < 6);

//3.For loop
// for ($x = 0; $x <= 10; $x++) {
//   if ($x == 5) break;
//   echo "The number is: $x <br>";
// }
// for ($x = 0; $x < 10; $x++) {
//   if ($x == 4) {
//     continue;
//   }
//   echo "The number is: $x <br>";
// }

//4.ForEach Loop
// $colors = array("red", "green", "blue", "yellow");

// foreach ($colors as $x) {
//   echo "$x <br>";
// }

$members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach ($members as $x => $y) {
  echo "$x : $y <br>";
}

?>

