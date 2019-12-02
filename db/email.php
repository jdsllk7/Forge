<?php


$name = $_POST['name'];
$sub = $_POST['sub'];
$email = $_POST['email'];
$body = $_POST['body'];


//EMAILING USER
$to = 'forge@gmail.com';
$subject = $sub;
$message_body = $name . $body;
$headers = "From: ". $email;
mail($to,$subject,$message_body,$headers);


header('Location:../sites/tempSite/index.php#email');
