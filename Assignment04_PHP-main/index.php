<!DOCTYPE html>
<html>
<head>
    <title>BMI Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Initialize variables
$nameErr = $contactErr = $weightErr = $heightErr = "";
$name = $age = $address = $contact = $weight = $height = "";

// Input cleaning function
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name validation
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $nameErr = "Invalid name format";
    }

    // Contact validation (your example style)
    $contact = test_input($_POST["contact"]);
    if (!preg_match("/^[0-9+\-() ]+$/", $contact)) {
        $contactErr = "Invalid phone number format";
    }

    // Age & Address
    $age = test_input($_POST["age"]);
    $address = test_input($_POST["address"]);

    // ✅ WEIGHT – REQUIRED
    if (empty($_POST["weight"])) {
        $weightErr = "Weight is required";
    } else {
        $weight = test_input($_POST["weight"]);
        if (!is_numeric($weight) || $weight <= 0) {
            $weightErr = "Invalid weight value";
        }
    }

    // ✅ HEIGHT – REQUIRED
    if (empty($_POST["height"])) {
        $heightErr = "Height is required";
    } else {
        $height = test_input($_POST["height"]);
        if (!is_numeric($height) || $height <= 0) {
            $heightErr = "Invalid height value";
        }
    }
}

/* ❌ Stop execution if Weight or Height invalid */
if ($weightErr != "" || $heightErr != "") {
    echo "<p style='color:red;text-align:center'>Please enter valid Weight and Height</p>";
    exit;
}

/* Conversions */
$weightPounds = $weight * 2.205;
$heightInches = $height / 2.54;

/* BMI Calculation */
$bmi = round(($weightPounds / ($heightInches * $heightInches)) * 703);

/* Category */
if ($bmi < 18.5)
    $category = "Under Healthy Weight";
elseif ($bmi < 25)
    $category = "Healthy Weight";
elseif ($bmi < 30)
    $category = "Overweight";
elseif ($bmi < 35)
    $category = "Obese I";
elseif ($bmi < 40)
    $category = "Obese II";
else
    $category = "Obese III";

/* Height display */
$feet = floor($heightInches / 12);
$inch = round($heightInches % 12);
?>

<div class="box">
    <h3>BMI Report of <?php echo $name; ?></h3>

    <p>Age: <?php echo $age; ?></p>
    <p>Address: <?php echo $address; ?></p>
    <p>Contact Number: <?php echo $contact; ?></p>

    <table border="1" width="100%" cellpadding="5">
        <tr>
            <th>Weight (Pounds)</th>
            <th>Height (Inches)</th>
            <th>BMI</th>
        </tr>
        <tr align="center">
            <td><?php echo round($weightPounds); ?></td>
            <td><?php echo $feet . "' " . $inch . '"'; ?></td>
            <td><?php echo $bmi; ?></td>
        </tr>
        <tr>
            <th colspan="3">Category : <?php echo $category; ?></th>
        </tr>
    </table>
</div>

</body>
</html>