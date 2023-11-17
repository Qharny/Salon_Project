<?php


// Include the mnotify library
require_once 'mnotify.php';

// Create a new instance of the mnotify class
$mnotify = new Mnotify();

// Set your mnotify API key
$mnotify->setApiKey('YOUR_API_KEY');

// Set the sender ID
$mnotify->setSenderId('SENDER_ID');

// Set the recipient's phone number
$mnotify->setRecipient('NUMBER');

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