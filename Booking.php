<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking || Area</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78i">
    <link rel="stylesheet" href="booking.css">
</head>
<body>
    <div class="secondary-header">
        <div class="mail">
            Get in touch: +233-24-000-0000 |<a href="#">CLick here for a <strong>BOOKING</strong></a> | info@salonproject.com
        </div>
        <div class="social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
<!-- <form method="post" action="booking.php">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Date: <input type="date" name="date"><br>
    Time: <input type="time" name="time"><br>
    <input type="submit" name="submit" value="Book">
</form> -->

<script src="https://kit.fontawesome.com/11daeabc17.js" crossorigin="anonymous"></script>
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
