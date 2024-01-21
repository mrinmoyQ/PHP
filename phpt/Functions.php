<h1>Functions</h1>
<?php

function processMarks($marksArr) {
    $sum = 0;
    foreach ($marksArr as $mark) {
        $sum += $mark;
    }
    return $sum;
}

function avgMarks($marksArr) {
    $avg = 0;
    $i = 1;
    foreach ($marksArr as $mark) {
        $avg += $mark;
        $i++;
    }
    return $avg/$i;
}

$rohan = [50 , 99 , 65 , 46 , 99 , 25];
$sum = processMarks($rohan);
echo "Total marks scored by rohan out of 600 is ". $sum ."marks <br>";
$avg = avgMarks($rohan);
echo "Average marks of rohan is ". $avg ;
?>

