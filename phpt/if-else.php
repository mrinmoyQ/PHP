<?php
$a = 50;
$b = 10;

if ($a > $b) {
    echo "a is greater than b";
    echo "<br>";
} else {
    echo "a is not greater than b";
    echo "<br>";
}

$age = 20;

if ($age > 18) {
    echo "You can drink alcohol<br>";
} elseif ($age > 13) {
    echo "You can drink coffee<br>";
} else {
    echo "You can drink water only<br>";
}
echo "Done";
?>