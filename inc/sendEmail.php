<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactName = htmlspecialchars($_POST['contactName']);
    $contactEmail = htmlspecialchars($_POST['contactEmail']);
    $contactSubject = htmlspecialchars($_POST['contactSubject']);
    $contactMessage = htmlspecialchars($_POST['contactMessage']);
    
    // Basic validation
    if (empty($contactName) || empty($contactEmail) || empty($contactMessage)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Validate email format
    if (!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
        exit;
    }

    // Prepare email
    $to = "your-email@example.com"; // Replace with your email
    $subject = $contactSubject ? $contactSubject : "New Contact Form Message";
    $message = "You have received a new message from: $contactName\n\nMessage:\n$contactMessage";
    $headers = "From: $contactEmail";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Something went wrong. Please try again.";
    }
}
?>
