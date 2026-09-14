<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request.");
}

// Your email address
$to = "info@ultrachemicals.co.za";

// Get form values
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['sub'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate required fields
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    exit("Please complete all required fields.");
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Please enter a valid email address.");
}

// Email subject
$mailSubject = "New Contact Form Message - UltraChemicals";

// Email headers
$headers = "From: UltraChemicals <info@ultrachemicals.co.za>\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Email body
$body = "You have received a new message from your website.\n\n";

$body .= "Name: " . $name . "\n";
$body .= "Email: " . $email . "\n";
$body .= "Subject: " . $subject . "\n";
$body .= "Message:\n";
$body .= $message . "\n\n";

$body .= "--------------------------------\n";
$body .= "Sent from the UltraChemicals website\n";

// Send email
if (mail($to, $mailSubject, $body, $headers)) {
    echo "Message sent successfully.";
} else {
    echo "Sorry, your message could not be sent.";
}

?>