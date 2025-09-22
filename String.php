<?php
$str = "Hello World";
echo "Length: " . strlen($str) . "<br>"; 


echo "Words: " . str_word_count($str) .  "<br>"; 

echo "Reversed: " . strrev($str) .  "<br>"; 

echo "Position of 'World': " . strpos($str, "World") .  "<br>"; 

echo "Last position of 'l': " . strrpos($str, "l") .  "<br>"; 

echo "Uppercase: " . strtoupper($str) .  "<br>"; 

echo "Lowercase: " . strtolower($str) .  "<br>"; 

echo "Ucfirst: " . ucfirst(strtolower($str)) .  "<br>"; 

echo "Lcfirst: " . lcfirst($str) .  "<br>"; 

echo "Ucwords: " . ucwords(strtolower($str)) .  "<br>"; 

$str2 = "   PHP   ";
echo "Trimmed: '" . trim($str2) . "'\n"; 

echo "Ltrim: '" . ltrim($str2) . "'\n"; 

echo "Rtrim: '" . rtrim($str2) . "'\n"; 

echo str_replace("World", "PHP", $str) .  "<br>"; 

echo str_ireplace("world", "PHP", $str) .  "<br>"; 

echo substr($str, 6) .  "<br>"; 
echo substr($str, 0, 5) .  "<br>"; 



$str3 = "apple,banana,orange";
print_r(explode(",", $str3));

$arr = ["PHP", "is", "fun"];
echo implode(" ", $arr) .  "<br>"; 



echo strcmp("Hello", "hello") .  "<br>"; 

echo strcasecmp("Hello", "hello") .  "<br>"; 


$str4 = "It's PHP";

echo addslashes($str4) .  "<br>";
echo stripslashes("It\'s PHP") .  "<br>"; 


$str5 = "<b>Bold</b>";
echo htmlentities($str5) .  "<br>"; 

echo html_entity_decode("&lt;b&gt;Bold&lt;/b&gt;") .  "<br>";

$str6 = "Hello \n World";
echo nl2br($str6); 

echo str_repeat("PHP ", 3) .  "<br>"; 

$str7 = "PHP is a popular scripting language.";
echo wordwrap($str7, 10,  "<br>") .  "<br>";


?>
