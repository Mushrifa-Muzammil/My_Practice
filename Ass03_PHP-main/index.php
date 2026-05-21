<?php
// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Initialize variables
$shopName = $address = $contact = $email = "";
$contactErr = $emailErr = "";

// Process form if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $shopName = test_input($_POST["shopName"]);
    $address = test_input($_POST["address"]);
    
    // Validate contact number - FIXED REGEX
    $contact = $_POST["contact"];
    if (!preg_match("/^[0-9\s\+\-\(\)]+$/", $contact)) {
        $contactErr = "Invalid phone number format";
    } else {
        $contact = test_input($contact);
    }
    
    // Validate email
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
    
    // Get item data
    $codes = isset($_POST['code']) ? $_POST['code'] : array();
    $names = isset($_POST['name']) ? $_POST['name'] : array();
    $quantities = isset($_POST['qty']) ? $_POST['qty'] : array();
    $prices = isset($_POST['price']) ? $_POST['price'] : array();
    
    // Filter out empty items
    $validItems = array();
    for ($i = 0; $i < count($codes); $i++) {
        if (!empty($codes[$i]) && !empty($names[$i]) && !empty($quantities[$i]) && !empty($prices[$i])) {
            $validItems[] = array(
                'code' => test_input($codes[$i]),
                'name' => test_input($names[$i]),
                'qty' => (float)$quantities[$i],
                'price' => (float)$prices[$i]
            );
        }
    }
    
    // Calculate totals and discounts
    $subtotal = 0;
    $totalDiscount = 0;
    $grandTotal = 0;
    
    // Store calculated item data
    $calculatedItems = array();
    
    foreach ($validItems as $item) {
        $itemTotal = $item['qty'] * $item['price'];
        $discount = 0;
        $discountType = "";
        
        // Apply discount rules
        if ($item['qty'] > 50) {
            // 5 free items for each 30 items
            $freeItems = floor($item['qty'] / 30) * 5;
            $discount = $freeItems * $item['price'];
            $discountType = "5 free per 30 items";
        } elseif ($item['qty'] > 20) {
            // 10% discount
            $discount = $itemTotal * 0.10;
            $discountType = "10% discount";
        } elseif ($item['qty'] > 10) {
            // 2% discount
            $discount = $itemTotal * 0.02;
            $discountType = "2% discount";
        }
        
        $itemNetTotal = $itemTotal - $discount;
        
        $calculatedItems[] = array(
            'code' => $item['code'],
            'name' => $item['name'],
            'qty' => $item['qty'],
            'price' => $item['price'],
            'itemTotal' => $itemTotal,
            'discount' => $discount,
            'discountType' => $discountType,
            'netTotal' => $itemNetTotal
        );
        
        $subtotal += $itemTotal;
        $totalDiscount += $discount;
        $grandTotal += $itemNetTotal;
    }
    
    // If there are validation errors, redirect back
    if (!empty($contactErr) || !empty($emailErr) || empty($validItems)) {
        // In a real application, you would redirect back with error messages
        // For simplicity, we'll just show an error and link back
        echo "<h2>Error in form submission</h2>";
        if (!empty($contactErr)) echo "<p>Contact Error: $contactErr</p>";
        if (!empty($emailErr)) echo "<p>Email Error: $emailErr</p>";
        if (empty($validItems)) echo "<p>Please add at least one item</p>";
        echo '<a href="index.html">Go back to form</a>';
        exit;
    }
} else {
    // If not POST request, redirect to form
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - <?php echo $shopName; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1 class="invoice-title"><i class="fas fa-file-invoice-dollar"></i> INVOICE</h1>
            <p>Generated on: <?php echo date('F j, Y'); ?></p>
            <p>Invoice #: INV-<?php echo date('Ymd-His'); ?></p>
        </div>
        
        <div class="invoice-details">
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-store"></i> Shop:</span>
                <span class="detail-value"><?php echo htmlspecialchars($shopName); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-map-marker-alt"></i> Address:</span>
                <span class="detail-value"><?php echo htmlspecialchars($address); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-phone"></i> Contact:</span>
                <span class="detail-value"><?php echo htmlspecialchars($contact); ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-envelope"></i> Email:</span>
                <span class="detail-value"><?php echo htmlspecialchars($email); ?></span>
            </div>
        </div>
        
        <div class="invoice-items">
            <h3><i class="fas fa-shopping-cart"></i> Items Purchased</h3>
            
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit Price (Rs.)</th>
                        <th>Total Price (Rs.)</th>
                        <th>Discount (Rs.)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($calculatedItems as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['code']); ?></td>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo number_format($item['qty'], 0); ?></td>
                        <td><?php echo number_format($item['price'], 2); ?></td>
                        <td><?php echo number_format($item['itemTotal'], 2); ?></td>
                        <td class="discount-cell">
                            <?php 
                            if ($item['discount'] > 0) {
                                echo number_format($item['discount'], 2) . 
                                     '<br><small>(' . $item['discountType'] . ')</small>';
                            } else {
                                echo '-';
                            }
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="invoice-summary">
            <div class="summary-row">
                <span class="summary-label">Subtotal:</span>
                <span class="summary-value">Rs. <?php echo number_format($subtotal, 2); ?></span>
            </div>
            
            <div class="summary-row discount-row">
                <span class="summary-label">Total Discount:</span>
                <span class="summary-value">- Rs. <?php echo number_format($totalDiscount, 2); ?></span>
            </div>
            
            <div class="summary-row final-total">
                <span class="summary-label">Grand Total:</span>
                <span class="summary-value">Rs. <?php echo number_format($grandTotal, 2); ?></span>
            </div>
        </div>
        
        <div class="invoice-actions">
            <button onclick="window.print()" class="print-btn">
                <i class="fas fa-print"></i> Print Invoice
            </button>
            
            <a href="index.html" class="new-invoice-btn">
                <i class="fas fa-plus-circle"></i> New Invoice
            </a>
        </div>
    </div>
    
    <script>
        // Add print functionality
        document.querySelector('.print-btn').addEventListener('click', function() {
            window.print();
        });
    </script>
</body>
</html>
