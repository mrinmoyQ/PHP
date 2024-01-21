<h1>Multi-Dimensional Arrays</h1>
<?php

//Creating a 2 dimensional array
$multiDim = array(
    array(2, 5, 7, 9),
    array(3, 5, 8, 9),
    array(4, 5, 6, 9)
);

// echo var_dump($multiDim);
// echo $multiDim[1][2] . "<br>";

// Printing the contents of a 2 dimensional array
// for ($i = 0; $i < count($multiDim); $i++) {
//     echo var_dump($multiDim[$i]);
//     echo"<br>";
// }

for ($i = 0; $i < count($multiDim); $i++) {
    for ($j = 0; $j < count($multiDim[$i]); $j++) {
        echo $multiDim[$i][$j] . " ";
    }
    echo "<br>";
}
?>