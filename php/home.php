<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 0 10px;
        }
        h1 {
            color: #333;
        }
        #posts ul {
            list-style-type: none;
            padding: 0;
        }
        #posts ul li {
            margin-bottom: 10px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }
        #posts ul li:hover {
            background-color: #e9e9e9;
        }
        a {
            text-decoration: none;
            color: #333;
        }
        #logout {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        #logout:hover {
            background-color: #da190b;
        }
        #profile-pic {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <img id="profile-pic" src="profile.jpg" alt="Admin Profile Picture">
    <p>Today is <span id="date"></span>.</p>
    <section id="posts">
        <ul>
            <li><a href="users.php">View Users</a></li>
            <li><a href="booking.php">View Booking History</a></li>
            <li><a href="#">Manage Pages</a></li>
            <li><a href="#">View Reports</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </section>
    <a id="logout" href="logout.php">Logout</a>

    <script src="script.js"></script>
</body>
</html>
