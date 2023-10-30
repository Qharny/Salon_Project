<?php
    // Include the connection file
    require "connection.php";

    // Check if the 'login' form has been submitted
    if(isset($_POST['login'])){
        // Sanitize and escape user input
        $uname = mysqli_real_escape_string($my_connection, $_POST['username']);
        $passd = mysqli_real_escape_string($my_connection, $_POST['password']);

        // SQL query to check if the username and password match in the database
        $compare = "SELECT * FROM signup WHERE Username = '$uname' AND Password = '$passd'";

        // Execute the query
        $check = mysqli_query($my_connection, $compare);

        // Check if a matching username and password is found in the database
        if(mysqli_num_rows($check) > 0){
            echo "<script> alert('Login successful'); window.location='./homepage.html'; </script>";
        }
        else{
            echo "<script> alert('Invalid username or password'); </script>";
        }
    }
?>
