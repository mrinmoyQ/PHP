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

$sql = "SELECT * FROM `phpx`";
$result = mysqli_query($conn, $sql);

//find the number of records returned
$num = mysqli_num_rows($result);
echo $num . "<br>";
echo" records found in the Database <br>";

// Display the rows returned by the sql query
if ($num > 0) {
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row) . "<br>";

    while ($row = mysqli_fetch_array($result)) {
        // echo var_dump($row) . "<br>";
        echo  $row['sno'] .". Hello " . $row['name'] . ", You're a " . $row['role'];
        echo "<br>";
    }
}
?>