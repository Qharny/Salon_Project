<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <table border="1">
    <thead>
        <tr>
            <th>
                User ID
            </th>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
            <th>
                Password
            </th>
        </thead>
        <tbody>
            <?php
            // Connect to the database
            require 'connection.php';

            // Query to get data from the database
            $sql = "SELECT * FROM signup";
            $result = $my_connection->query($sql);
            // Check if there are any results returned
            if ($result->num_rows > 0) {
                // Loop through the results
                while ($row = $result->fetch_assoc()) {
                    // Display the results in a table format
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["FullName"] . "</td><td>" . $row["Username"] . "</td><td>" . $row["Email"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            // Close the connection
            $my_connection->close();
            ?>
        </tbody>
    </table>
</body>
</html>