<h1>Associative Arrays</h1>
<?php

// $arr = array("This","that","what","why");
// echo $arr[0] . "<br>";

//Associative Arrays
$favCol = array(
    "Mrinmoy" => "Blue", 
    "Shubham" => "Red", 
    "Onion" => "Violet", 
    "Leon" => "Black", 
    "Paul" =>"White"
    );

// echo $favCol ["Mrinmoy"] . "<br>";
// echo $favCol ["Leon"] . "<br>";

foreach ($favCol as $key => $value) {
    echo "Favourite color of ". $key ." is ". $value ."<br>";
}

?>