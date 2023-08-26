<?php
$to = 'goyalsakshi1229@gmail.com';
$subject = 'Test email';
$message = 'This is a test email from PHP';

// Additional headers
$headers = 'From: IT.apprentice@fresenius-kabi.com' . "\r\n" . 'Reply-To: IT.apprentice@fresenius-kabi.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

// Send the email using the mail() function
mail($to, $subject, $message, $headers);
?>