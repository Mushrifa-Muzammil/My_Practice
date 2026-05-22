<!DOCTYPE html>
<html>
<head>
    <title>Internet Usage Bill</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

$name = $_POST['name'];
$account = $_POST['account'];
$type = $_POST['type'];
$package = $_POST['package'];
$extra_gb = (int)$_POST['extra_gb'];

/* Monthly rental */
$monthly_rental = 0;
switch ($package) {
    case "Basic": $monthly_rental = 760; break;
    case "Web Lite": $monthly_rental = 1520; break;
    case "Any Blast": $monthly_rental = 2340; break;
    case "Family Plan": $monthly_rental = 3790; break;
}

/* Fiber rental */
$fiber_rental = ($type == "Fiber") ? 760 : 0;

/* Extra GB calculation */
$remaining = $extra_gb;
$extra_cost = 0;

if ($remaining > 0) {
    $gb = min(4, $remaining);
    $extra_cost += $gb * 100;
    $remaining -= $gb;
}
if ($remaining > 0) {
    $gb = min(15, $remaining);
    $extra_cost += $gb * 85;
    $remaining -= $gb;
}
if ($remaining > 0) {
    $gb = min(30, $remaining);
    $extra_cost += $gb * 75;
    $remaining -= $gb;
}
if ($remaining > 0) {
    $extra_cost += $remaining * 60;
}

$total = $fiber_rental + $monthly_rental + $extra_cost;

?>

<h2>Internet Usage Bill of Account Number <?php echo $account; ?></h2>

<p><strong>Customer Name:</strong> <?php echo $name; ?></p>
<p><strong>Internet Package:</strong> <?php echo $package; ?></p>

<table>
    <tr>
        <th>Description</th>
        <th>Units</th>
        <th>Amount (Rs.)</th>
    </tr>
    <tr>
        <td>Rental : <?php echo $type; ?></td>
        <td>-</td>
        <td><?php echo $fiber_rental; ?></td>
    </tr>
    <tr>
        <td>Monthly Rental</td>
        <td>-</td>
        <td><?php echo $monthly_rental; ?></td>
    </tr>
    <tr>
        <td>Extra GB Used</td>
        <td><?php echo $extra_gb; ?></td>
        <td><?php echo $extra_cost; ?></td>
    </tr>
    <tr>
        <th>Total</th>
        <th>-</th>
        <th><?php echo $total; ?></th>
    </tr>
</table>

</body>
</html>