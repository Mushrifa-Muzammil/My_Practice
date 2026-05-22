<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$contactErr = $emailErr = "";

$shop    = test_input($_POST["shop"]);
$address = test_input($_POST["address"]);

$contact = test_input($_POST["contact"]);
if (!preg_match("/^[0-9+\-() ]+$/", $contact)) {
    $contactErr = "Invalid phone number format";
}

$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
}

if ($contactErr || $emailErr) {
    echo "<h2>Error</h2>";
    echo "<p style='color:red;'>$contactErr</p>";
    echo "<p style='color:red;'>$emailErr</p>";
    exit;
}

$codes  = $_POST["code"];
$names  = $_POST["name"];
$qtys   = $_POST["qty"];
$prices = $_POST["price"];

$total = 0;
$discountTotal = 0;
?>

<div class="container">
<h2><?php echo $shop; ?> – Invoice</h2>

<p>
<b>Address:</b> <?php echo $address; ?><br>
<b>Contact:</b> <?php echo $contact; ?><br>
<b>Email:</b> <?php echo $email; ?>
</p>

<table>
<tr>
    <th>Item Code</th>
    <th>Item Name</th>
    <th>Quantity</th>
    <th>Total Price (Rs.)</th>
</tr>

<?php
for ($i = 0; $i < count($codes); $i++) {
    $itemTotal = $qtys[$i] * $prices[$i];
    $discount = 0;

    if ($qtys[$i] > 50) {
        $free = floor($qtys[$i] / 30) * 5;
        $discount = $free * $prices[$i];
    } elseif ($qtys[$i] > 20) {
        $discount = $itemTotal * 0.10;
    } elseif ($qtys[$i] > 10) {
        $discount = $itemTotal * 0.02;
    }

    $discountTotal += $discount;
    $total += ($itemTotal - $discount);
?>

<tr>
    <td><?php echo $codes[$i]; ?></td>
    <td><?php echo $names[$i]; ?></td>
    <td><?php echo $qtys[$i]; ?></td>
    <td><?php echo number_format($itemTotal, 2); ?></td>
</tr>

<?php } ?>

<tr>
    <td colspan="3"><b>Total Discount</b></td>
    <td><?php echo number_format($discountTotal, 2); ?></td>
</tr>

<tr>
    <td colspan="3"><b>Grand Total</b></td>
    <td><b><?php echo number_format($total, 2); ?></b></td>
</tr>

</table>
</div>

</body>
</html>
