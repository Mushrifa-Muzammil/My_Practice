<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Total Bill</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Your Total Bill</h1>

    <?php
    $biscuits = $_POST['biscuits'] * 50;
    $noodles  = $_POST['noodles'] * 100;
    $bread    = $_POST['bread'] * 40;
    $milk     = $_POST['milk'] * 60;
    $eggs     = $_POST['eggs'] * 5;
    $dhal     = $_POST['dhal'] * 75;

    $total = $biscuits + $noodles + $bread + $milk + $eggs + $dhal;

    echo "<p><strong>Total Bill: Rs$total</strong></p>";
    ?>

    <a href="index.html">Go Back</a>
</body>
</html>