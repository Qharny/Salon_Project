<?php
session_start();
require "connection.php";

if(isset($_POST['send'])){
    $name = mysqli_real_escape_string($my_connection, $_POST['loginUser']);
    $pass = mysqli_real_escape_string($my_connection, $_POST['loginPassword']);

    $query = "SELECT * FROM Admin WHERE AdminName = '$name' OR AdminEmail = '$name'";
    $result = mysqli_query($my_connection, $query);

    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($pass == $row["AdminPassword"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["AdminID"];
            header("Location: ../php/dashboard.php"); // Redirect to homepage after successful login
            exit();
        } else {
            echo "<script> alert('Wrong Password');window.location.href='../HTML/admin.html'; </script>";
        }
    } else {
        echo "<script> alert('User not registered');window.location.href='../HTML/admin.html'; </script>";
    }
}{
        $stmt = $my_connection->prepare("SELECT * FROM Admin WHERE AdminName = ? OR AdminEmail = ?");
        $stmt->bind_param("ss", $name, $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result && $result->num_rows > 0){
            $row = $result->fetch_assoc();

            if(password_verify($pass, $row["AdminPassword"])){
                $_SESSION["send"] = true;
                $_SESSION["id"] = $row["AdminID"];
                header("Location: ../php/dashboard.php"); // Redirect to dashboard after successful login
                exit();
            } else {
                echo "<script> alert('Wrong Password');window.location.href='../HTML/admin.html'; </script>";
            }
        } else {
            echo "<script> alert('User not registered');window.location.href='../HTML/admin.html'; </script>";
        }

        $stmt->close();
    }

?>