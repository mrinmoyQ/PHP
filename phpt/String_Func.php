<?php

$name = "Mrinmoy is a good boy";
echo $name;
echo "<br>";

echo "The length of my name is " . strlen($name);
// strlen() gives the length of the string
// . joins two strings
echo"<br>";

echo str_word_count($name); // gives word count of the string
echo "<br>";

echo strrev($name); // reverses the string
echo "<br>";

echo strpos($name,"is"); // returns the given string's starting position
echo "<br>";

echo str_replace("Mrinmoy","Leon", $name); // replaces the given string
echo "<br>";

echo str_repeat($name,3); // repeats the string the given number of times
echo "<br>";

echo"<pre>";
echo rtrim("    This is a good code   "); //trims the right end
echo "<br>";
echo ltrim("    This is a good code   "); // trims the left end
echo "</pre>";

?>