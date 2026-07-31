<?php
// TASK 1
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$message = $_REQUEST['message'];
echo "Name: $name <br>";
echo "Email: $email <br>";
echo "Message: $message <br>";

// TASK 2
echo "Host name: " . $_SERVER['HTTP_HOST'] . "<br>";
echo "PHP version: " . phpversion() . "<br>";
echo "Request method used: " . $_SERVER['REQUEST_METHOD'] . "<br>";
?>