<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request");
}

function clean($data) {
    return htmlspecialchars(trim($data));
}

function daysBetween($start, $end) {
    $d1 = new DateTime($start);
    $d2 = new DateTime($end);
    return $d1->diff($d2)->days;
}

$roomCharges = [
    "Riverside" => ["Standard"=>7500, "Deluxe"=>8500, "Executive"=>10000],
    "Lagoon"    => ["Standard"=>8500, "Deluxe"=>10000, "Executive"=>12500],
    "Nature"    => ["Standard"=>10000,"Deluxe"=>12500,"Executive"=>15000],
    "Beach"     => ["Standard"=>12500,"Deluxe"=>15000,"Executive"=>20000]
];

$activityRates = [
    "spa"=>5000,
    "cycling"=>400,
    "swimming"=>1000,
    "gym"=>850
];

$name   = clean($_POST['customer']);
$hotel  = $_POST['hotel'];
$room   = $_POST['room'];
$board  = $_POST['board'];
$days   = daysBetween($_POST['checkin'], $_POST['checkout']);

$total = $roomCharges[$hotel][$room] * $days;

if ($board === "Full") {
    $total += 3500;
}

$activities = [];

foreach ($activityRates as $key => $rate) {
    if (!empty($_POST[$key]) && $_POST[$key . "_hours"] > 0) {
        $hours = (int)$_POST[$key . "_hours"];
        $cost = $rate * $hours;
        $activities[$key] = $cost;
        $total += $cost;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservation Receipt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Reservation Receipt</h2>

<div class="receipt">
    <p><b>Customer:</b> <?= $name ?></p>
    <p><b>Hotel:</b> <?= $hotel ?></p>
    <p><b>Room:</b> <?= $room ?></p>
    <p><b>Days:</b> <?= $days ?></p>

    <hr>

    <p><b>Room Charges:</b> Rs. <?= $roomCharges[$hotel][$room] * $days ?></p>
    <p><b>Board Type:</b> <?= $board ?></p>

    <?php foreach ($activities as $a => $c): ?>
        <p><b><?= ucfirst($a) ?>:</b> Rs. <?= $c ?></p>
    <?php endforeach; ?>

    <hr>
    <h3>Total Amount: Rs. <?= $total ?></h3>
</div>

</body>
</html>
