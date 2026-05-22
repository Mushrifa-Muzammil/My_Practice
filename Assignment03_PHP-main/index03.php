<!DOCTYPE html>
<html>
<head>
<!--1st try basic-->
    <title>ABC Shop Invoice</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        h2, h3 { text-align: center; }
        .container { width: 80%; margin: auto; }
        input[type=text], input[type=number] { width: 95%; }
        .btn { padding: 6px 12px; }
    </style>
</head>
<body>

<?php
if (!isset($_POST['submit'])) {
?>

<div class="container">
    <h2>Shop Details</h2>
    <form method="post">
        Shop Name: <input type="text" name="shop" required><br><br>
        Address: <input type="text" name="address" required><br><br>
        Contact Number: <input type="text" name="contact" required><br><br>
        Email Address: <input type="text" name="email" required><br><br>

        <h3>Items</h3>
        <table>
            <tr>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price (Rs.)</th>
            </tr>

            <?php for ($i = 0; $i < 3; $i++) { ?>
            <tr>
                <td><input type="text" name="code[]"></td>
                <td><input type="text" name="name[]"></td>
                <td><input type="number" name="qty[]" min="0"></td>
                <td><input type="number" name="price[]" min="0"></td>
            </tr>
            <?php } ?>
        </table><br>

        <center>
            <input type="submit" name="submit" value="Submit" class="btn">
            <input type="reset" value="Clear" class="btn">
        </center>
    </form>
</div>

<?php
} else {

    $discount = 0;
    $total = 0;

    echo "<h2>{$_POST['shop']} - Invoice</h2>";
    echo "<div class='container'>";
    echo "Address: {$_POST['address']}<br>";
    echo "Contact Number: {$_POST['contact']}<br>";
    echo "Email: {$_POST['email']}<br><br>";

    echo "<table>
            <tr>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price (Rs.)</th>
            </tr>";

    for ($i = 0; $i < count($_POST['code']); $i++) {
        $qty = $_POST['qty'][$i];
        $unit = $_POST['price'][$i];
        if ($qty > 0 && $unit > 0) {

            // Free items
            if ($qty > 50) {
                $free = floor($qty / 30) * 5;
                $qty = $qty - $free;
            }

            $price = $qty * $unit;

            // Discounts
            if ($qty > 20) {
                $discount += $price * 0.10;
            } elseif ($qty > 10) {
                $discount += $price * 0.02;
            }

            $total += $price;

            echo "<tr>
                    <td>{$_POST['code'][$i]}</td>
                    <td>{$_POST['name'][$i]}</td>
                    <td>{$qty}</td>
                    <td>" . number_format($price, 2) . "</td>
                  </tr>";
        }
    }

    echo "<tr>
            <td colspan='3'><b>Discount</b></td>
            <td><b>" . number_format($discount, 2) . "</b></td>
          </tr>";

    echo "<tr>
            <td colspan='3'><b>Total</b></td>
            <td><b>" . number_format($total - $discount, 2) . "</b></td>
          </tr>";

    echo "</table></div>";
}
?>

</body>
</html>
