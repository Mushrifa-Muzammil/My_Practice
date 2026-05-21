<?php
// Initialize variables
$nameErr = $emailErr = $contactErr = $dobErr = $positionErr = $resumeErr = $coverletterErr = $linkedinErr = $experienceErr = $skillsErr = "";
$name = $email = $contact = $dob = $position = $resume = $coverletter = $linkedin = $experience = $skills = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Contact
    if (empty($_POST["contact"])) {
        $contactErr = "Contact number is required";
    } else {
        $contact = test_input($_POST["contact"]);
        if (!preg_match("/^[0-9+\-() ]+$/", $contact)) {
            $contactErr = "Invalid phone number format";
        }
    }

    // Validate Date of Birth
    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
        $birthDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;
        
        if ($age < 18) {
            $dobErr = "You must be at least 18 years old";
        }
    }

    // Validate Position
    if (empty($_POST["position"])) {
        $positionErr = "Position is required";
    } else {
        $position = test_input($_POST["position"]);
    }

    // Validate Resume (File Upload)
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
        $allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        $maxSize = 2 * 1024 * 1024; // 2MB
        
        $fileType = $_FILES['resume']['type'];
        $fileSize = $_FILES['resume']['size'];
        
        if (!in_array($fileType, $allowedTypes)) {
            $resumeErr = "Only PDF and DOC files are allowed";
        } elseif ($fileSize > $maxSize) {
            $resumeErr = "File size must be less than 2MB";
        } else {
            $resume = $_FILES['resume']['name'];
            // Move uploaded file to a directory
            $uploadDir = "uploads/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $targetFile = $uploadDir . basename($_FILES['resume']['name']);
            move_uploaded_file($_FILES['resume']['tmp_name'], $targetFile);
        }
    } else {
        $resumeErr = "Resume is required";
    }

    // Validate Cover Letter (optional)
    if (!empty($_POST["coverletter"])) {
        $coverletter = test_input($_POST["coverletter"]);
    }

    // Validate LinkedIn URL
    if (!empty($_POST["linkedin"])) {
        $linkedin = test_input($_POST["linkedin"]);
        if (!filter_var($linkedin, FILTER_VALIDATE_URL)) {
            $linkedinErr = "Invalid URL";
        }
    }

    // Validate Experience
    if (empty($_POST["experience"])) {
        $experienceErr = "Experience is required";
    } else {
        $experience = test_input($_POST["experience"]);
        if ($experience < 0 || $experience > 50) {
            $experienceErr = "Experience must be between 0 and 50 years";
        }
    }

    // Validate Skills
    if (empty($_POST["skills"])) {
        $skillsErr = "At least one skill is required";
    } else {
        $skills = implode(", ", $_POST["skills"]);
    }

    // If no errors, display success message
    if (empty($nameErr) && empty($emailErr) && empty($contactErr) && empty($dobErr) && 
        empty($positionErr) && empty($resumeErr) && empty($coverletterErr) && 
        empty($linkedinErr) && empty($experienceErr) && empty($skillsErr)) {
        
        // Display application data
        echo "<div style='max-width: 600px; margin: 20px auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>";
        echo "<h2 style='color: #4CAF50; text-align: center;'>Application Submitted Successfully!</h2>";
        echo "<div style='margin: 20px 0; padding: 20px; background: #f9f9f9; border-radius: 5px;'>";
        echo "<p><b>Name:</b> " . htmlspecialchars($name) . "</p>";
        echo "<p><b>Email:</b> " . htmlspecialchars($email) . "</p>";
        echo "<p><b>Contact:</b> " . htmlspecialchars($contact) . "</p>";
        echo "<p><b>Date of Birth:</b> " . htmlspecialchars($dob) . "</p>";
        echo "<p><b>Position:</b> " . htmlspecialchars($position) . "</p>";
        echo "<p><b>Resume:</b> " . htmlspecialchars($resume) . "</p>";
        echo "<p><b>Cover Letter:</b> " . nl2br(htmlspecialchars($coverletter)) . "</p>";
        echo "<p><b>LinkedIn:</b> " . htmlspecialchars($linkedin) . "</p>";
        echo "<p><b>Experience:</b> " . htmlspecialchars($experience) . " years</p>";
        echo "<p><b>Skills:</b> " . htmlspecialchars($skills) . "</p>";
        echo "</div>";
        echo "<p style='text-align: center;'><a href='index.html' style='background: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Submit Another Application</a></p>";
        echo "</div>";
        exit();
    } else {
        // Display error page or redirect back with errors
        echo "<div style='max-width: 600px; margin: 20px auto; padding: 20px; background: #ffe6e6; border-radius: 10px; border: 1px solid #ffcccc;'>";
        echo "<h2 style='color: #ff3333;'>Error in Form Submission</h2>";
        echo "<p>Please correct the following errors:</p>";
        echo "<ul>";
        if (!empty($nameErr)) echo "<li>Name: $nameErr</li>";
        if (!empty($emailErr)) echo "<li>Email: $emailErr</li>";
        if (!empty($contactErr)) echo "<li>Contact: $contactErr</li>";
        if (!empty($dobErr)) echo "<li>Date of Birth: $dobErr</li>";
        if (!empty($positionErr)) echo "<li>Position: $positionErr</li>";
        if (!empty($resumeErr)) echo "<li>Resume: $resumeErr</li>";
        if (!empty($linkedinErr)) echo "<li>LinkedIn: $linkedinErr</li>";
        if (!empty($experienceErr)) echo "<li>Experience: $experienceErr</li>";
        if (!empty($skillsErr)) echo "<li>Skills: $skillsErr</li>";
        echo "</ul>";
        echo "<p><a href='index.html' style='background: #ff3333; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Go Back and Fix Errors</a></p>";
        echo "</div>";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>