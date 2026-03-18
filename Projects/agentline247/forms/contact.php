<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = strip_tags($_POST['phone']);
    $message = strip_tags($_POST['message']);
    
    $to = "novaopsassistant@gmail.com";
    $subject = "New Contact from AgentLine Website";
    $email_body = "You have received a new message from the AgentLine website:\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Message:\n$message\n";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    if (mail($to, $subject, $email_body, $headers)) {
        echo '<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        .success { color: #28a745; font-weight: bold; }
        .back { margin-top: 20px; }
    </style>
</head>
<body>
    <h1 class="success">Thank You!</h1>
    <p>Your message has been sent successfully. We\'ll get back to you soon.</p>
    <div class="back">
        <a href="javascript:history.back()">← Back to AgentLine</a>
    </div>
</body>
</html>';
    } else {
        echo '<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        .error { color: #dc3545; font-weight: bold; }
        .back { margin-top: 20px; }
    </style>
</head>
<body>
    <h1 class="error">Error!</h1>
    <p>Sorry, there was an error sending your message. Please try again later.</p>
    <div class="back">
        <a href="javascript:history.back()">← Back</a>
    </div>
</body>
</html>';
    }
}
?>