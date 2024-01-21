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

$sql = "SELECT * FROM `phpx` WHERE `role`='Prog'";
$result = mysqli_query($conn, $sql);

//Usage of WHERE Clause to fetch data from db
$num = mysqli_num_rows($result);
echo $num . "<br>";
echo " records found in the Database <br>";
$no = 1;
// Display the rows returned by the sql query
if ($num > 0) {
    while ($row = mysqli_fetch_array($result)) {
        // echo var_dump($row) . "<br>";
        echo $no . ". Hello " . $row['name'] . ", You're a " . $row['role'];
        echo "<br>";
        $no++;
    }
}

//Usage of WHERE Clause to update data
$sql = "UPDATE `phpx` SET `name` = 'Coder' WHERE `phpx`.`role` = 'Prog'";
$result = mysqli_query($conn, $sql);
$aff = mysqli_affected_rows($conn);
echo "The number of affected rows: $aff" . "<br>";

if (!$result) {
    echo "We couldn't update the record" . mysqli_error($conn) . "<br>";
} else {
    echo "We updated the record" . "<br>";
}
?>