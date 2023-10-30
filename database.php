<?php

    
    // Include the connection file
    require "conn.php";
    // session_start(); // Start the session

    // Check if the 'login' form has been submitted
    if(isset($_POST['login'])){
        $name = mysqli_real_escape_string($my_connection, $_POST['mail']);
        $pass = mysqli_real_escape_string($my_connection, $_POST['password']);

        $data = "SELECT * FROM signup WHERE Username = '$name' OR Email = '$name'";
        $result = mysqli_query($my_connection, $data);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) > 0){
                if(password_verify($pass, $row["Password"])){
                    // Set session variables for login
                    $_SESSION["login"] = true;
                    $_SESSION["id"] = $row["id"];
                }
                else{
                    // Display an alert when the user enters the wrong password
                    echo "<script> alert('Wrong Password'); </script>";
                }
            } else {
                // Display an alert when the entered username or email is not registered
                echo "<script> alert('User not registered'); </script>";
            }
        } else {
            // Display an alert for query execution error
            echo "<script> alert('Error executing query'); </script>";
        }
    }




    // // Include the connection file
    // require "conn.php"; 

    // // Check if the 'login' form has been submitted
    // if(isset($_POST['login'])){
    //     $name = mysqli_real_escape_string($my_connection, $_POST['mail']);  // Sanitize and escape the entered username or email
    //     $pass = mysqli_real_escape_string($my_connection, $_POST['password']); // Sanitize and escape the entered password
        
    //     $data = "SELECT * FROM signup WHERE Username = '$name' OR Email = '$name'"; 
    //     // SQL query to retrieve user data based on entered username or email
    //     $result = mysqli_query($my_connection, $data); 
    //     // Execute the query and get the result
        
    //     $row = mysqli_fetch_assoc($result); 
    //     // Fetch a row of data from the query result
        
    //     if($row = mysqli_num_rows($result) > 0){
    //         // Check if the result has more than 0 rows (user found)
            
    //         if($pass == $row["Password"]){
    //             // Check if the entered password matches the stored password
                
    //             // Set session variables for login
    //             $_SESSION["login"] = true;
    //             $_SESSION["id"] = $row["id"];
    //         }
    //         else{
    //             // Display an alert when the user enters the wrong password
    //             echo "<script> alert('Wrong Password'); </script>"; 
    //         }
    //     } else {
    //         // Display an alert when the entered username or email is not registered
    //         echo "<script> alert('User not registered'); </script>";
    //     }
    // }
?>