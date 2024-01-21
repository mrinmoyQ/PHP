<?php

// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";

// Create a connection 
$conn = mysqli_connect($servername, $username, $password);

// die if connection wasn't successful
if (!$conn) {
    die("Couldn't connect" . mysqli_connect_error());
}
echo "Connection was successful";

//create a db
$sql = "CREATE DATABASE dbMrinmoy";
$result = mysqli_query($conn, $sql);

//Check for the database creation success
if ($result) {
    echo "The db was created successfully" . "<br>";
} else {
    echo "Operation Failed because of this --->" . mysqli_error($conn) . "<br>";
}
echo "The result is" . var_dump($result) . "<br>";


?>