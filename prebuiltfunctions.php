<?php
$marks = [80, 60, 70, 90, 90, 80, 100];
print_r($marks);

echo "<br>--Aggregate functions--<br>";

echo "Total elements: " . count($marks) . "<br>";   
echo "Maximum mark: " . max($marks) . "<br>";       
echo "Minimum mark: " . min($marks) . "<br>";       
echo "Total sum: " . array_sum($marks) . "<br>";   
echo "Total elements using sizeof(): " . sizeof($marks) . "<br><br>";

sort($marks);
echo "Sorted Ascending: " . implode(", ", $marks) . "<br>";

rsort($marks);
echo "Sorted Descending: " . implode(", ", $marks) . "<br>";

$assoc = ["c" => 3, "a" => 1, "b" => 2];
ksort($assoc); 
echo "<br>ksort: ";
print_r($assoc);
echo "<br>";

krsort($assoc);
echo "krsort: ";
print_r($assoc);
echo "<br>";

echo "<br>";
array_push($marks, 95);
array_unshift($marks, 30);
echo "After Push & Unshift: <br>";
print_r($marks);

array_pop($marks);
array_shift($marks);
echo "<br>After Pop & Shift:<br>";
print_r($marks);

echo "<br> Is 90 in array? " . (in_array(90, $marks) ? "Yes" : "No") . "<br>";
echo "Key of value 100: " . array_search(100, $marks) . "<br>";

echo "Unique Values:\n";
print_r(array_unique($marks));

echo "<br> Product of Marks: " . array_product([2, 3, 4]) . "<br>";

echo "Random Key:<br> ";
print_r(array_rand($marks, 2));

shuffle($marks);
echo "<br>Shuffled Array:\n";
print_r($marks);

$passed = array_filter($marks, fn($mark) => $mark >= 75);
echo "<br>Marks >= 75:<br>";
print_r($passed);

$doubled = array_map(fn($mark) => $mark * 2, $marks);
echo "<br>Doubled Marks:<br>";
print_r($doubled);
echo "<br>";

$input  = array("php", 4.0, array("green", "red"));
$reversed = array_reverse($input);
echo"<br>";
print_r($input);
echo"<br>";
print_r($reversed);

echo"<br>";
$chunk_arr = [1, 2, 3, 4, 5, 6];
$chunks = array_chunk($chunk_arr, 4); 
print_r($chunks);
echo "<br>";


$arr1 = [1, 2, 3];
$arr2 = [4, 5, 6];
$merged = array_merge($arr1, $arr2);
echo "Merged array: " . implode(", ", $merged) . "<br><br>";

?>