<?php
    // Start a new or resume an existing session
    // session_start();

    // Database connection parameters
    $host = "localhost";        // Database host
    $user_name = "root";        // Database username
    $pass = "";                // Database password
    $db_name = "Salon_project";   // Database name

    // Establish a connection to the database
    $my_connection = mysqli_connect($host, $user_name, $pass, $db_name);

    // Check if the connection was successful
    // if($my_connection){
    //     echo "Connected to database Successfully"; // Display a success message if connected
    // }
    // else{
    //     die("Connection Failed" . mysqli_error()); // Display an error message if connection failed
    // }
?>