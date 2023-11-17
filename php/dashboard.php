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
    <aside class="sidebar">

        <nav>
            <ul>
                <li class="logo"><img alt="" src="../imgs/account.png"></li>
                <li>
                    <a href="#" onclick="showContent('home')" ><i class="fa fa-home"></i>   home</a>
                </li>
                <li>
                    <!-- <a href="#"><i class="fa fa-book"></i>   about</a> -->
                </li>
                <li>
                    <a href="#" onclick="showContent('users')"><i class="fa fa-users"></i>   Users</a>
                </li>
                <li>
                    <!-- <a href="#"><i class="fa fa-picture-o"></i>   portfolio</a> -->
                </li>
                <li>
                    <a href="#" onclick="showContent('booking')"><i class="fa fa-book"></i>   Booking</a>
                </li>
            </ul>
        </nav>
    </aside>
    <main id="main-content" class="main-content">
        <!-- Content goes here -->
    </main>

    <script>
        function showContent(content) {
            var mainContent = document.getElementById('main-content');

            switch(content) {
                case 'home':
                    fetch('../php/home.php')
                        .then(response => response.text())
                        .then(data => mainContent.innerHTML = data);
                    break;
                case 'users':
                    fetch('../php/users.php')
                        .then(response => response.text())
                        .then(data => mainContent.innerHTML = data);
                    break;
                case 'booking':
                    fetch('../php/bookingHistory.php')
                        .then(response => response.text())
                        .then(data => mainContent.innerHTML = data);
                    break;
                default:
                    mainContent.innerHTML = '';
            }
        }

        // Show home content by default
        showContent('home');
    </script>
</body>

</html>
