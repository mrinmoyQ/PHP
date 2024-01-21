<?php
$name = "Mrinmoy";
$income = 200;

//PHP data types
/*
1. String
2. Integers
3. Float
4. Boolean
5. Object
6. Array
7. NULL
*/

//String - Sequel of characters
$name = "Mrinmoy";
echo "$name <br>";

// Integer - Non decimal number
$income = 455;
$debts = -655;
echo $income;
echo "<br>";

// Float - Decimal point number
$Currency = 344.5;
echo $Currency;
echo "<br>";

// Booleans - Can be either true or false
$x = true;
$is_friend = false;
echo $x;
echo "<br>";
echo var_dump($is_friend);
echo "<br>";

// Object - Instances of classes
// Employee is a class ----> Mrinmoy can be a object

// Array - Used to store multiple value in a single varibles
$friends = array("Snehar", "Mota" , "Onion" , "Leon");
echo var_dump($friends);
echo "<br>";
echo $friends[0];
echo "<br>";
echo $friends[1];
echo "<br>";
echo $friends[2];
echo "<br>";
echo $friends[3];
echo "<br>";

// NULL
$name = NULL;
echo var_dump($name);
?>