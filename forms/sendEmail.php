<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form fields
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Validate the form fields
  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    // Display an error message if any field is empty
    http_response_code(400);
    echo 'Please fill out all fields.';
    exit;
  }

  // Set up the email
  $to = 'heinrich@wellnessexcellence.co.za'; // Replace with your own email address
  $headers = "From: $name <$email>" . "\r\n";
  $body = "Name: $name\nEmail: $email\nSubject: $subject\n\n$message";

  // Send the email
  if (mail($to, $subject, $body, $headers)) {
    // Display a success message if the email was sent successfully
    http_response_code(200);
    echo 'Your message has been sent. Thank you!';
    exit;
  } else {
    // Display an error message if the email could not be sent
    http_response_code(500);
    echo 'Oops! Something went wrong and we could not send your message.';
    exit;
  }
} else {
  // Display an error message if the form was not submitted
  http_response_code(403);
  echo 'Access denied.';
  exit;
}
?>
