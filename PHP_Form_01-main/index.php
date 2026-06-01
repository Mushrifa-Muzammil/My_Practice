<?php
$name = $email = $website = $comment = $gender = "";
$nameErr = $emailErr = $websiteErr = $genderErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function clean($data) {
        return htmlspecialchars(trim(stripslashes($data)));
    }

    if (empty($_POST["name"])) {
        $nameErr = "Name required";
    } else {
        $name = clean($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email required";
    } else {
        $email = clean($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }

    if (!empty($_POST["website"])) {
        $website = clean($_POST["website"]);
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (!empty($_POST["comment"])) {
        $comment = clean($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Select gender";
    } else {
        $gender = clean($_POST["gender"]);
    }
}

$valid = empty($nameErr) && empty($emailErr) && empty($websiteErr) && empty($genderErr);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>

<div class="container">
    <h2>PHP Form</h2>

    <form method="post" onsubmit="return validateForm();">

        <label>Name</label>
        <input type="text" name="name" id="name">
        <span class="error"><?php echo $nameErr; ?></span>

        <label>Email</label>
        <input type="email" name="email" id="email">
        <span class="error"><?php echo $emailErr; ?></span>

        <label>Website</label>
        <input type="text" name="website">
        <span class="error"><?php echo $websiteErr; ?></span>

        <label>Comment</label>
        <textarea name="comment"></textarea>

        <label>Gender</label>
        <div class="radio">
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
            <input type="radio" name="gender" value="other"> Other
        </div>
        <span class="error"><?php echo $genderErr; ?></span>

        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $valid): ?>
        <div class="output">
            <h3>✅ Your Input</h3>
            <p><b>Name:</b> <?php echo $name; ?></p>
            <p><b>Email:</b> <?php echo $email; ?></p>
            <p><b>Website:</b> <?php echo $website; ?></p>
            <p><b>Comment:</b> <?php echo $comment; ?></p>
            <p><b>Gender:</b> <?php echo $gender; ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
