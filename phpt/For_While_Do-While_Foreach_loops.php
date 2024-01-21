<h1> While Loops <br></h1>
<?php

// While Loop

$i = 1;
while ($i <= 5) {
    echo $i . "<br>";
    $i++;
}
?>
<h1> For Loops <br></h1>
<?php
for ($x = 1; $x <= 5; $x++) {
    ?>
    <h4> The number is
        <?php echo $x ?> <br>
    </h4>
    <?php
}

// Do-While Loop
?>
<h1> Do-While Loop</h1>
<?php

$y = 1;
do {
    ?>
    <h4>
        <?php
        echo "$y <br>";
        ?>
    </h4>
    <?php
    $y++;
} while ($y <= 5);

// Foreach Loop
?>
<h1> Foreach Loop</h1>
<?php

//Numeric Array
$arr = array("Banana", "Apple", "Orange", "Sweet", "Bread");
foreach ($arr as $v) {
    echo $v . "<br>";
}
?>