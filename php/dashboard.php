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

        <nav>
            <ul>
                <li class="logo"><img alt="" src="../imgs/account.png"></li>
                <li>
                    <a href="#"><i class="fa fa-home"></i>   home</a>
                </li>
                <li>
                    <!-- <a href="#"><i class="fa fa-book"></i>   about</a> -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i>   Users</a>
                </li>
                <li>
                    <!-- <a href="#"><i class="fa fa-picture-o"></i>   portfolio</a> -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-book"></i>   Booking</a>
                </li>
            </ul>
        </nav>
        <!-- <div class="wrapper">
            <div class="section">
                <div class="box-area">
                    <h2 style="color: #2b2626">Homepage</h2>
                </div>
            </div>
        </div> -->
        <ul>
            <li><a href="">Booking</a></li>
            <!-- <li><a href="">Users</a></li> -->
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
                if (!$my_connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                //selecting all the data from the booking table
                $sql = "SELECT * FROM booking";
                //executing the query
                $result = mysqli_query($my_connection, $sql);
                //checking if the query is successful
                if (!$result) {
                    die("Query failed: " . mysqli_error($my_connection));
                }
                //looping through the data
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['Fulllname'] . "</td>";
                    echo "<td>" . $row['contact'] . "</td>";
                    echo "<td>" . $row['service'] . "</td>";
                    echo "<td>" . $row['stylist'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
    </main>
</body>

</html>