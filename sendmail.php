<?php
$email_to = "rebecca@dyadproductions.com";
$name = $_POST["name"];
$email_from = $_POST["email"];
$message = $_POST["message"];
$email_subject = "Message from Dyad Productions";
$headers = "From: " . $email_from . "\n";
$headers .= "Reply-To: " . $email_from . "\n";
$message = "Name: ". $name . "\r\nMessage: " . $message;
ini_set("sendmail_from", $email_from);
$sent = mail($email_to, $email_subject, $message, $headers, "-f" .$email_from);
if ($sent)
{
header("Location: http://www.dyadproductions.com/thank-you.php");
} else {
echo "Sorry there was an error sending your message. Please try again.";
}
?>