<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // Validate form fields
    if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please fill in all fields correctly.";
        exit;
    }

    // Your email where the message will be sent
    $to = "yasho1612@gmail.com";
    $email_subject = "New Contact Form Message from $name";
    $email_body = "Name: $name\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    echo "Invalid request.";
}
?>
