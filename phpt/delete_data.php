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
    echo "Connection was successful <br>";
}

$sql = "DELETE FROM phpx WHERE `phpx`.`role` = 'Prog' LIMIT 3";
$result = mysqli_query($conn, $sql);
$aff = mysqli_affected_rows($conn);
echo "The number of affected rows: $aff" . "<br>";

if($result){
    echo "Deleted";
}else{
    $err = mysqli_error($conn);
    echo "not deleted due to this error --> $err";
}
?>