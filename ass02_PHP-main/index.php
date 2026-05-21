<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Grocery Bill</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bill-container">
        <h1>🧾 Your Grocery Bill</h1>
        
        <?php
        // Prices
        $prices = [
            'biscuits' => 50,
            'noodles' => 100,
            'bread' => 40,
            'milk' => 60,
            'eggs' => 5,
            'dhal' => 75
        ];
        
        $item_names = [
            'biscuits' => 'Biscuits',
            'noodles' => 'Noodles',
            'bread' => 'Bread',
            'milk' => 'Milk',
            'eggs' => 'Eggs',
            'dhal' => 'Dhal'
        ];
        
        // Calculate totals
        $items = [];
        $total = 0;
        
        foreach ($prices as $item => $price) {
            if (isset($_POST[$item]) && is_numeric($_POST[$item]) && $_POST[$item] > 0) {
                $quantity = (float)$_POST[$item];
                $item_total = $quantity * $price;
                $items[] = [
                    'name' => $item_names[$item],
                    'quantity' => $quantity,
                    'price' => $price,
                    'total' => $item_total
                ];
                $total += $item_total;
            }
        }
        
        // Display bill breakdown
        if (count($items) > 0) {
            echo '<table class="bill-breakdown">';
            echo '<tr><th>Item</th><th>Quantity</th><th>Unit Price</th><th>Total</th></tr>';
            
            foreach ($items as $item) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($item['name']) . '</td>';
                echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
                echo '<td>Rs' . htmlspecialchars($item['price']) . '</td>';
                echo '<td>Rs' . htmlspecialchars(number_format($item['total'], 2)) . '</td>';
                echo '</tr>';
            }
            
            echo '<tr class="total-row">';
            echo '<td colspan="3" style="text-align: right;"><strong>Grand Total:</strong></td>';
            echo '<td><strong>Rs' . number_format($total, 2) . '</strong></td>';
            echo '</tr>';
            echo '</table>';
            
            echo '<div class="bill-amount">Rs' . number_format($total, 2) . '</div>';
            
        } else {
            echo '<div class="message">';
            echo '<p>No items selected. Please go back and add some items to your cart.</p>';
            echo '</div>';
        }
        ?>
        
        <a href="index.html" class="back-link">← Back to Calculator</a>
    </div>
</body>
</html>