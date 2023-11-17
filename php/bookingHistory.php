<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Get data from the database into a table -->
    <table>
        <thead>
            <tr>
                <th>
                    Booking ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Category
                </th>
                <th>
                    Service
                </th>
                <th>
                    Contact
                </th>
                <th>
                    Date
                </th>
                <th>
                    Time
                </th>
        </thead>
        <tbody>
            <?php
            // Connect to the database
            require 'connection.php';

            // Query to get data from the database
            $sql = "SELECT * FROM booking";
            $result = $my_connection->query($sql);
            // Check if there are any results returned
            if ($result->num_rows > 0) {
                // Loop through the results
                while ($row = $result->fetch_assoc()) {
                    // Display the results in a table format
                    echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["name"] . "</td><td>" . $row["category"] . "</td><td>" . $row["service"] . "</td><td>" . $row["contact"] . "</td><td>" . $row["date"] . "</td><td>" . $row["time"] . "</td></tr>";
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