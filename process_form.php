<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Set up email parameters
    $to = "info@kavachextrusion.com"; 
    $subject = "New Form Submission from $firstName $lastName";
    $headers = "From: $email";

    // Compose email message
    $emailMessage = "Name: $firstName $lastName\n";
    $emailMessage .= "Email: $email\n";
    $emailMessage .= "Phone: $phone\n\n";
    $emailMessage .= "Message:\n$message";

    // Send email
    if (mail($to, $subject, $emailMessage, $headers)) {
        // Redirect before any output is sent
        header("Location: success_page.php");
        exit;
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Handle non-POST requests (optional)
    echo "Invalid request method";
}
?>
