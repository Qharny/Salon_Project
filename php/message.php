<?php


// Include the mnotify library
require_once 'mnotify.php';

// Create a new instance of the mnotify class
$mnotify = new Mnotify();

// Set your mnotify API key
$mnotify->setApiKey('l4OSeqp1RxuNBY3dmNr6J1NlP');

// Set the sender ID
$mnotify->setSenderId('Page1Salon');

// Set the recipient's phone number
$mnotify->setRecipient('+1234567890');

// Set the message content
$message = 'Welcome to our platform!';

// Send the message
$response = $mnotify->sendMessage($message);

// Check if the message was sent successfully
if ($response['status'] == 'success') {
    echo 'Message sent successfully!';
} else {
    echo 'Failed to send message. Error: ' . $response['message'];
}


?>