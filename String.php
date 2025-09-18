<?php
$str = "Hello World";
echo "Length: " . strlen($str) . "<br>"; 


echo "Words: " . str_word_count($str) . "\n"; 

echo "Reversed: " . strrev($str) . "\n"; 

echo "Position of 'World': " . strpos($str, "World") . "\n"; 

echo "Last position of 'l': " . strrpos($str, "l") . "\n"; 

echo "Uppercase: " . strtoupper($str) . "\n"; 

echo "Lowercase: " . strtolower($str) . "\n"; 

echo "Ucfirst: " . ucfirst(strtolower($str)) . "\n"; 

echo "Lcfirst: " . lcfirst($str) . "\n"; 

echo "Ucwords: " . ucwords(strtolower($str)) . "\n"; 

$str2 = "   PHP   ";
echo "Trimmed: '" . trim($str2) . "'\n"; 

echo "Ltrim: '" . ltrim($str2) . "'\n"; 

echo "Rtrim: '" . rtrim($str2) . "'\n"; 

echo str_replace("World", "PHP", $str) . "\n"; 

echo str_ireplace("world", "PHP", $str) . "\n"; 

echo substr($str, 6) . "\n"; 
echo substr($str, 0, 5) . "\n"; 

$str3 = "apple,banana,orange";
print_r(explode(",", $str3));


$arr = ["PHP", "is", "fun"];
echo implode(" ", $arr) . "\n"; 

echo strcmp("Hello", "hello") . "\n"; 

echo strcasecmp("Hello", "hello") . "\n"; /
$str4 = "It's PHP";
echo addslashes($str4) . "\n";

echo stripslashes("It\'s PHP") . "\n"; 

$str5 = "<b>Bold</b>";
echo htmlentities($str5) . "\n"; 

echo html_entity_decode("&lt;b&gt;Bold&lt;/b&gt;") . "\n";

$str6 = "Hello\nWorld";
echo nl2br($str6); 

echo str_repeat("PHP ", 3) . "\n"; 

$str7 = "PHP is a popular scripting language.";
echo wordwrap($str7, 10, "\n") . "\n";


?>
