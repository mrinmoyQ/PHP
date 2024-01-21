<?php

// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbmrinmoy";

// Create a connection 
$conn = mysqli_connect($servername, $username, $password, $database);

// die if connection wasn't successful
if (!$conn) {
    die("Couldn't connect" . mysqli_connect_error());
} else {
    echo "Connection was successful";
}
// Table Variables
$name = "Onion";
$role = "Programmer";

//SQL query to be executed
$sql = "INSERT INTO `phpx` ( `name`, `role`) VALUES ( '$name', '$role')";
$result = mysqli_query($conn, $sql);

//Add data into the phpx table in the database
if ($result) {
    echo "The record has been inserted successfully" . "<br>";
} else {
    echo "Operation Failed , table wasn't inserted because of this --->" . mysqli_error($conn) . "<br>";
}
echo "The result is" . var_dump($result) . "<br>";
?>