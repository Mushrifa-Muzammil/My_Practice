<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    $position = $_POST['position'];
    $experience = $_POST['experience'];
    $linkedin = $_POST['linkedin'];
    $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : "None";

    echo "<h2>Application Submitted Successfully</h2>";
    echo "<p><b>Name:</b> $fullname</p>";
    echo "<p><b>Email:</b> $email</p>";
    echo "<p><b>Contact:</b> $contact</p>";
    echo "<p><b>Date of Birth:</b> $dob</p>";
    echo "<p><b>Position:</b> $position</p>";
    echo "<p><b>Experience:</b> $experience years</p>";
    echo "<p><b>Skills:</b> $skills</p>";
}
?>