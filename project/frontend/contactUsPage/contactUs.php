<?php
$name = $_POST['name'];
$visitorEmail = $_POST['email'];
$message = $_POST['message'];

$emailFrom = "leonardevansmutugi@gmail.com";
$emailSubject = "New form Submission";
$emailBody = "User Name: $name. \n" . "User Email: $visitorEmail. \n" . "User Message: $message \n";
$to = "evansmutugi2017@gmail.com";
$headers = "From: $emailFrom \r\n" . "Reply-To: $visitorEmail \r\n";
mail($to, $emailSubject, $emailBody, $headers);
header("Location: contactUs.html");