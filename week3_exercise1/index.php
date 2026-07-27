<!--TODO 1-->

<?php 
echo "My name is Cial. My favourite programming
language is HTML because it is easy to use and is the programming language that we use in all of our web pages."; 
?><br><br>

<!--TODO 2-->

<?php
$num1 = 5;
$num2 = 6;

echo $num1 + $num2;
?><br><br>

<!--TODO 3-->

<?php
echo "Today is " . date("l, F d, Y");
?>

<!--TODO 4-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>
    <?php
    echo "Welcome to PHP Programming!";
    ?>
  </h1>
</body>
</html>

<!--TODO 5-->

<?php
$randomNumber = rand(1, 100);
echo "Your lucky number today is: $randomNumber";
?>