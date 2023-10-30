<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking || Area</title>
</head>
<body>
<form method="post" action="booking.php">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Date: <input type="date" name="date"><br>
    Time: <input type="time" name="time"><br>
    <input type="submit" name="submit" value="Book">
</form>
</body>
</html>
<?php
    require "connection.php";

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $sql = "INSERT INTO bookings (name, email, date, time) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $date, $time);
        $stmt->execute();

        echo "Booking successful!";
    }
?>
