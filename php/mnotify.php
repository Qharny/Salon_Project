<?php
    require 'connection.php';

    // Get the contact from the user input
    $contact = $_POST["telephone"];

    // Prepare the SQL query
    $sql_query = "SELECT id FROM Booking WHERE contact = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql_query);
    
    // Bind the parameters
    $stmt->bind_param("s", $contact);

    // Execute the query and get the result
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned any row
    if ($result->num_rows > 0) {
        // Fetch the row as an associative array
        $row = $result->fetch_assoc();
        // Get the id value from the array
        $recipient_id = $row["id"];
        // Echo the id value
        echo $recipient_id;
    } else {
        // No row found, echo an error message
        echo "No user found with that contact";
    }

    // Define the mnotify class
    class Mnotify
    {
        // Declare the properties
        private $api_key;
        private $sender_id;
        private $recipient;
        private $base_url = 'https://api.mnotify.net/v1/';

        // Define the constructor
        public function __construct($recipient)
        {
            // Initialize the properties
            $this->api_key = 'API_KEY';
            $this->sender_id = 'Page1Salon';
            $this->recipient = $recipient;
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

    // Create a new instance of the Mnotify class
    $mnotify = new Mnotify($contact);
?>
