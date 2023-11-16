<?php
    session_start();

    require "connection.php";

    // login
    if(isset($_POST['send'])){
        $name = $_POST['loginUser'];
        $pass = $_POST['loginPassword'];
        $mail = $_POST['loginMail'];

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
