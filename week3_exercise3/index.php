<!--Task 1-->

<?php
$totalBudget = 5000;
$groceries = 1500;
$transport = 800;
$entertainment = 600;
$remainingBudget = $totalBudget - ($groceries + $transport + $entertainment);
echo "Total Budget: $" . $totalBudget . "<br>";
echo "Groceries: $" . $groceries . "<br>";
echo "Transport: $" . $transport . "<br>";
echo "Entertainment: $" . $entertainment . "<br>";
echo "Remaining Budget: $" . $remainingBudget . "<br>";
?><br><br>

<!--Task 2-->

<?php
$age = 25;
if ($age <= 12) {
    echo "Child(under 12) <br>";
} elseif ($age >= 13 && $age <= 17) {
    echo "Teen(13-17) <br>";
} elseif ($age >= 18 && $age <= 64) {
    echo "Adult(18-64) <br>";
} else {
    echo "Senior(65+) <br>";
}
?><br><br>

<!--Task 3-->

<?php
$amount = 10000;
$rate = 5;
$time = 3;
$interest = ($amount * $rate * $time) / 100;
$newAmount = $amount + $interest;
echo "Principal Amount: $" . $amount . "<br>";
echo "Interest: $" . $interest . "<br>";
echo "New Amount: $" . $newAmount . "<br>";
?><br><br>

<!--Task 4-->

<?php
$age = 27;
$isRegisteredToVote = true;
if ($age >= 18 && $age <= 35 && $isRegisteredToVote) {
    echo "Eligible to vote.";
} else {
    echo "Not eligible to vote.";
}
?><br><br>

<!--Task 5-->

<?php
$purchaseAmount = 872;
$discount = 0;
if ($purchaseAmount > 1000) {
    $discount = 10;
} elseif ($purchaseAmount >= 500 && $purchaseAmount <= 999) {
    $discount = 5;
} elseif ($purchaseAmount >= 250 && $purchaseAmount <= 499) {
    $discount = 2;
} else {
    $discount = 0;
}
$discountAmount = ($purchaseAmount * $discount) / 100;
$finalAmount = $purchaseAmount - $discountAmount;
echo "Purchase Amount: R$purchaseAmount <br>";
echo "Discount Amount: R$discountAmount <br>";
echo "Final Amount: R$finalAmount";
?>