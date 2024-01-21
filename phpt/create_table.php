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

//create a table in the db
$sql = "CREATE TABLE `phpX` (`sno` INT(10) NOT NULL AUTO_INCREMENT , `name` VARCHAR(14) NOT NULL , `role` VARCHAR(10) NOT NULL , `doj` DATETIME NOT NULL , PRIMARY KEY (`sno`))";
$result = mysqli_query($conn, $sql);

//Check for the table creation success
if ($result) {
    echo "The table was created successfully" . "<br>";
} else {
    echo "Operation Failed , table wasn't created because of this --->" . mysqli_error($conn) . "<br>";
}
echo "The result is" . var_dump($result) . "<br>";
?>