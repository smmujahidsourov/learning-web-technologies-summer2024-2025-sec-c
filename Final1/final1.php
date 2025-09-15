
<h2>1. Rectangle Area & Perimeter</h2>
<?php
$length = 10;
$width = 5;
$area = $length * $width;

$perimeter = 2 * ($length + $width);
echo "Length = $length, Width = $width <br>";
echo "Area = $area <br>";
echo "Perimeter = $perimeter <br>";
?>

<hr>

<h2>2. VAT Calculation</h2>
<?php
$amount = 1000;
$vat = $amount * 0.15;
echo "Amount = $amount <br>";
echo "VAT (15%) = $vat <br>";
?>

<hr>

<h2>3. Odd or Even</h2>
<?php
$number = 25;
if ($number % 2 == 0) {
    echo "$number is Even";
} else {
    echo "$number is Odd";
}
?>

<hr>

<h2>4. Largest of Three Numbers</h2>
<?php
$a = 45; $b = 78; $c = 12;
if ($a >= $b && $a >= $c) {
    $largest = $a;
} elseif ($b >= $a && $b >= $c) {
    $largest = $b;
} else {
    $largest = $c;
}
echo "Numbers: $a, $b, $c <br>";
echo "Largest = $largest";
?>

<hr>

<h2>5. Odd Numbers (10 - 100)</h2>
<?php
for ($i = 11; $i <= 100; $i += 2) {
    echo $i . " ";
}
?>

<hr>

<h2>6. Search Element in Array</h2>
<?php
$arr = array(10, 20, 30, 40, 50);
$search = 30;
$found = false;
foreach ($arr as $value) {
    if ($value == $search) {
        $found = true;
        break;
    }
}
if ($found) {
    echo "Element $search found in array!";
} else {
    echo "Element $search not found.";
}
?>

<hr>

<h2>7. Print Shapes (Nested Loops)</h2>
<?php
// Shape 1
for ($i=1; $i<=3; $i++) {
    for ($j=1; $j<=$i; $j++) {
        echo "* ";
    }
    echo "<br>";
}
echo "<br>";

// Shape 2
for ($i=3; $i>=1; $i--) {
    for ($j=1; $j<=$i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}
echo "<br>";

// Shape 3
$ch = 'A';
for ($i=1; $i<=3; $i++) {
    for ($j=1; $j<=$i; $j++) {
        echo $ch++ . " ";
    }
    echo "<br>";
}
?>

<hr>

<h2>8. Shapes from 2D Array</h2>
<?php
$shape = [
    [1,2,3,"A"],
    [1,2,"B","C"],
    [1,"D","E","F"]
];

foreach ($shape as $row) {
    foreach ($row as $val) {
        echo $val . " ";
    }
    echo "<br>";
}
?>

