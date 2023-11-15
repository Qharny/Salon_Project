<?php
    require 'connection.php';

// Define the mnotify class
class Mnotify
{
    // Declare the properties
    private $api_key;
    private $sender_id;
    private $recipient;
    private $base_url = 'https://api.mnotify.net/v1/';


    // Get the email and password from the user input
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    // Prepare the SQL query
    $sql_query = "SELECT id FROM user_info WHERE Buyer_Email = '$Email' AND Buyer_Password = '$Password'";

    // Execute the query and get the result
    $result = mysqli_query($conn, $sql_query);

    // Check if the query returned any row
    if (mysqli_num_rows($result) > 0) {
        // Fetch the row as an associative array
        $row = mysqli_fetch_assoc($result);
        // Get the id value from the array
        $recipient_id = $row["id"];
        // Echo the id value
        echo $recipient_id;
    } else {
        // No row found, echo an error message
        echo "No user found with that email and password";
    }


    // Define the constructor
    public function __construct()
    {
        // Initialize the properties
        $this->api_key = 'l4OSeqp1RxuNBY3dmNr6J1NlP';
        $this->sender_id = 'Page1Salon';
        $this->recipient = '';
    }

    // Define the setter methods
    public function setApiKey($api_key)
    {
        // Set the api key
        $this->api_key = $api_key;
    }

    public function setSenderId($sender_id)
    {
        // Set the sender id
        $this->sender_id = $sender_id;
    }

    public function setRecipient($recipient)
    {
        // Set the recipient
        $this->recipient = $recipient;
    }

    // Define the getter methods
    public function getApiKey()
    {
        // Get the api key
        return $this->api_key;
    }

    public function getSenderId()
    {
        // Get the sender id
        return $this->sender_id;
    }

    public function getRecipient()
    {
        // Get the recipient
        return $this->recipient;
    }

    // Define the send message method
    public function sendMessage($message)
    {
        // Prepare the request data
        $data = [
            'recipient' => $this->getRecipient(),
            'sender' => $this->getSenderId(),
            'message' => $message,
            'key' => $this->getApiKey()
        ];

        // Encode the data as JSON
        $data = json_encode($data);

        // Create a new curl session
        $curl = curl_init();

        // Set the curl options
        curl_setopt($curl, CURLOPT_URL, $this->base_url . 'sms/send');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        // Execute the curl request
        $response = curl_exec($curl);

        // Close the curl session
        curl_close($curl);

        // Decode the response as an associative array
        $response = json_decode($response, true);

        // Return the response
        return $response;
    }
}
