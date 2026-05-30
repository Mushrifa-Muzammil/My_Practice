<?php
// process.php - Form handler for contact and login

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Handle Contact Form
    if (isset($_POST['contact_submit'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $phone = htmlspecialchars(trim($_POST['phone']));
        $location = htmlspecialchars(trim($_POST['location'])); // New location field
        $subject = htmlspecialchars(trim($_POST['subject']));
        $message = htmlspecialchars(trim($_POST['message']));
        
        // Basic validation
        $errors = [];
        if (empty($name)) $errors[] = "Name is required";
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required";
        if (empty($phone)) $errors[] = "Phone is required";
        if (empty($location)) $errors[] = "Location is required"; // New validation
        if (empty($message)) $errors[] = "Message is required";
        
        if (empty($errors)) {
            // Here you can send email or save to database
            // For demo, we'll just show success message and redirect
            session_start();
            $_SESSION['contact_success'] = "Thank you $name from $location! We'll get back to you soon.";
            header('Location: contact.html?status=success');
            exit;
        } else {
            // Store errors in session and redirect back
            session_start();
            $_SESSION['contact_errors'] = $errors;
            header('Location: contact.html?status=error');
            exit;
        }
    }
    
    // Handle Login Form
    if (isset($_POST['login_submit'])) {
        $email = htmlspecialchars(trim($_POST['email']));
        $password = $_POST['password'];
        
        // Simple hardcoded login for demo (replace with database check)
        if ($email == 'demo@example.com' && $password == 'password') {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_email'] = $email;
            header('Location: index.html');
            exit;
        } else {
            session_start();
            $_SESSION['login_error'] = "Invalid email or password";
            header('Location: login.html?status=error');
            exit;
        }
    }
    
    // Handle Order Form (if needed)
    if (isset($_POST['order_submit'])) {
        // Process order...
        session_start();
        $_SESSION['order_success'] = "Your order has been placed!";
        header('Location: order.html?status=success');
        exit;
    }
    
} else {
    // If someone tries to access directly, redirect to home
    header('Location: index.html');
    exit;
}
?>