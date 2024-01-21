<h2>This is the stage where we are ready to get connected to database</h2>
<?php

/* Ways to connect to a MySQL Database
1. MySQLi extension
2. PDO
*/

// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";

// Create a connection 
$conn = mysqli_connect($servername, $username, $password);

// die if connection wasn't successful
if(!$conn){
    die("Couldn't connect". mysqli_connect_error());
}
echo"Connection was successful";
?>