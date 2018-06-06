<?php
$email_to = "rebecca@dyadproductions.com";
$name = $_POST["name"];
$email_from = $_POST["email"];
$message = $_POST["comments"];
$email_subject = "Feedback from website";
$headers = "From: " . $email_from . "\n";
$headers .= "Reply-To: " . $email_from . "\n";
$message = "Name: ". $name . "\r\nMessage: " . $message;
ini_set("sendmail_from", $email_from);
$sent = mail($email_to, $email_subject, $message, $headers, "-f" .$email_from);
if ($sent)
{
header("Location: http://www.google.com");
} else {
echo "There has been an error sending your comments. Please try later.";
}
?>