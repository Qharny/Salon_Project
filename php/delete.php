<?php
    // Get the ID from the POST request
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];

    // Connect to the database
    require 'connection.php';

    // Prepare the SQL statement
    $stmt = $my_connection->prepare("DELETE FROM booking WHERE ID = ?");

    // Bind the ID to the SQL statement
    $stmt->bind_param("i", $id);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // If the SQL statement executed successfully, return a success message
        echo json_encode(['success' => true]);
    } else {
        // If the SQL statement failed, return an error message
        echo json_encode(['success' => false]);
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $my_connection->close();
?>
