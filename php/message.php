<?php
// $api_key = 'l4OSeqp1RxuNBY3dmNr6J1NlP'; // Replace with your API Key
// $url = 'https://apps.mnotify.net/smsapi?key=l4OSeqp1RxuNBY3dmNr6J1NlP&to={+233201209873}&msg=Confirmed&sender_id=Page1Salon'; // API URL
// $data = array(
//     'sender' => 'Page1Salon', // Sender ID
//     'message' => 'Hello, this is a test message', // Message
//     'mobiles' => '+233201209873', // Recipient Phone Number
// );

// $options = array(
//     'http' => array(
//         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//         'method'  => 'POST',
//         'content' => http_build_query($data),
//     ),
// );
// $context  = stream_context_create($options);
// $result = file_get_contents($url, false, $context);
// if ($result === FALSE) { /* Handle error */ }

// var_dump($result);


$endPoint = 'https://api.mnotify.com/api/senderid/register';
$apiKey = 'l4OSeqp1RxuNBY3dmNr6J1NlP'; // Your API Key
$url = $endPoint . '?key=' . $apiKey;
$data = [
  'sender_name' => 'Page1Salon', // Sender ID
  'purpose' => 'Booking Confirmation '
];

$ch = curl_init();
$headers = array();
$headers[] = "Content-Type: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$result = curl_exec($ch);
$result = json_decode($result, TRUE);
curl_close($ch);



?>
