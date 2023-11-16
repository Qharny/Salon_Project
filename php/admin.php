<?php

    require "connection.php";

    // login
    if(isset($_POST['send'])){
        $name = mysqli_real_escape_string($my_connection, $_POST['loginUser']);
        $pass = mysqli_real_escape_string($my_connection, $_POST['loginPassword']);

        $query = "SELECT * FROM signup WHERE Username = '$name' OR Email = '$name'";
        $result = mysqli_query($my_connection, $query);

        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            if(password_verify($pass, $row["Password"])){
                $_SESSION["send"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: ../php/dashboard.php"); // Redirect to homepage after successful login
                exit();
            } else {
                echo "<script> alert('Wrong Password');window.location.href='../HTML/admin.html'; </script>";
            }
        } else {
            echo "<script> alert('User not registered');window.location.href='../HTML/admin.html'; </script>";
        }
    }

?>