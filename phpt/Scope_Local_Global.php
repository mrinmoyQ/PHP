<h1>Scope , Local and Global Variables</h1>
<?php

$a = 98; // Global Variables
$b = 9;
function printValue(){
    // $a = 95; // Local Variables 
    global $a, $b; //give me the access to this global variable
    $a = 10;
    $b = 100;
    echo"The value of your variable a is $a and b is $b";
}

echo $a . "<br>";
printValue();

echo var_dump($GLOBALS); // Returns all global variables in program
?>