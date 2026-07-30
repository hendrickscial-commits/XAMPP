<!--Task 1-->

<?php
$x = 0;
for ($i = 0; $i < 11; $i++) {
  echo "i is equal to $i <br>";
}
?><br><br>

<!--Task 2-->

<?php
$cars = array("Jaguar F-Type", "Supra", "Porsche 911");
for ($i = 0; $i < count($cars); $i++) {
  echo $cars[$i] . "<br>";
}
?><br><br>

<!--Task 3-->

<?php
foreach ($cars as $car) {
  echo $car . "<br>";
}
?><br><br>

<!--Task 4-->

<?php
$x = 0;
while ($x <= 5) {
  echo "x is equal to $x <br>";
  $x++;
}
?><br><br>

<!--Task 5-->

<?php
$y = 6;
do {
  echo "Y is equal to $y <br>";
  $y++;
} while ($y <= 5);
?><br><br>

<!--Task 6-->

<?php
function printMyName($name) {
  echo $name . "<br>";
}

printMyName("Jack");
?><br><br>

<!--Task 7-->

<?php
function multiply($num1, $num2) {
  return $num1 * $num2;
}
echo multiply(5, 2);
?><br><br>

<!--Task 8-->

<?php
function arrayLooper($array) {
  foreach ($array as $item) {
    echo $item . "<br>";
  }
}
$fruits = array("Apple", "Orange", "Mango", "Banana");
arrayLooper($fruits);
?>