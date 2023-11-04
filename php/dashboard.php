<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://kit.fontawesome.com/0fdab1252a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/dashboard.css">
    </head>
<body>
    <!-- creating dastboard with html -->
    <header id="header" class="header">
        <a href="#" class="logo"><i class="fas fa-female"></i>Page One <span>Salon</span></a>
        <nav class="navbar">
            <a href="../index.html">home</a>
            <a href="../HTML/login.html">Login</a>
        </nav>
    </header>
    <aside>
        <ul>
            <li><a href="">Booking</a></li>
            <li><a href="">Users</a></li>
        </ul>
    </aside>
    <main>
        <!-- table to display users -->
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Telephone</th>
                    <th>Service</th>
                    <th>Stylist</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //connecting to the database
                    require "../php/connection.php";
                    //checking if the connection is successful
                    if(!$my_connection){
                        die("Connection failed: ".mysqli_connect_error());
                    }
                    //selecting all the data from the booking table
                    $sql = "SELECT * FROM signup";
                    //executing the query
                    $result = mysqli_query($conn, $sql);
                    //checking if the query is successful
                    if(!$result){
                        die("Query failed: ".mysqli_error($my_connection));
                    }
                    //looping through the data
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['Fulllname']."</td>";
                        echo "<td>".$row['contact']."</td>";
                        echo "<td>".$row['service']."</td>";
                        echo "<td>".$row['stylist']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['time']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
    </main>
</body>
</html>