<!--Task 1-->

<?php 
$Name = "Cial";
$Age = 20;
$Color = "Purple";
$Hobby = "Photography";
echo "Hi, I'm $Name. I'm $Age years old, my favorite color is $Color and my favourite hobby is $Hobby.";
?><br><br>

<!--Task 2-->

<?php
$weight = 87;
$height = 1.75;

$bmi = $weight / ($height * $height);

if ($bmi < 18.5) {
    echo "Your BMI is: " . round($bmi, 1) . " (underweight).";
} elseif ($bmi >= 18.5 && $bmi < 25) {
    echo "Your BMI is: " . round($bmi, 1) . " (normal weight).";
} elseif ($bmi >= 25 && $bmi < 30) {
    echo "Your BMI is: " . round($bmi, 1) . " (overweight).";
} else {
    echo "Your BMI is: " . round($bmi, 1) . " (obese).";
}
?><br><br>

<!--Task 3-->

<?php
$globalVar = 25; //global variable

function testScope() {
$localVar = 10; //local variable
echo "Inside the function, the local variable is: $localVar<br>";
global $globalVar; //Allows the global variable to be used inside the function
echo "Inside the function, the global variable is: $globalVar<br>";
}

testScope();
echo "Outside the function, the global variable is: $globalVar";
//echo $localVar; // This will cause an error because $localVar is not accessible outside the function
?><br><br>

<!--Task 4-->

<?php
$floatNum = 12.37;
$intNum = intval($floatNum);

echo "The float number is: $floatNum<br>";
echo "The integer number is: $intNum";
?><br><br>

<!--Task 5-->

<?php
$number = 15;
$decimal = 4.7;
$word = "Pistachio";
$row = array("Red", "Green", "Blue");

echo "Number is a: " . gettype($number) . "<br>";
echo "Decimal is a: " . gettype($decimal) . "<br>";
echo "Word is a: " . gettype($word) . "<br>";
echo "Row is a: " . gettype($row) . "<br>";
?>