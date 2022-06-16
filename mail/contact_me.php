<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'ionbisa@gmail.com'; // Add your email address inbetween the '' replacing ionbisa@gmail.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "Anda telah menerima pesan baru dari formulir kontak situs web Anda.\n\n"."berikut rinciannya:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: ionbisa@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like ionbisa@gmail.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>