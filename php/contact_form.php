<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

#Receive user input
$full_name = $_POST['full_name'];
$phone_number = $_POST['phone_number'];
$email_address = $_POST['email_address'];
$selection = $_POST['selection'];
$message = $_POST['message'];

#Filter user input
#function filter_email_header($form_field) {  
#return preg_replace('/[nr|!/<>^$%*&]+/','',$form_field);


#$email_address  = filter_email_header($email_address);

#Send email
$headers = "From: $email_address";
$whole_message = "Name: $full_name Phone Number: $phone_number Email: $email_address Service: $selection Message: $message";
$sent = mail('questions@qnacontracting.com',$whole_message,$headers);

#Thank user or notify them of a problem
if ($sent) {

?><html>
<head>
<title>Thank You for reaching out</title>
</head>
<body>
<h1>Thank You</h1>
<p>Thank you for contacting us. We will follow up as soon as possible</p>
</body>
</html>
<?php

} else {

?><html>
<head>
<title>Something went wrong</title>
</head>
<body>
<h1>Something went wrong</h1>
<p>We could not send your feedback. Please try again.</p>
</body>
</html>
<?php
}

header( "refresh:5;url=index.html" );
?>