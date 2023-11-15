<?php
    require "./connection.php";

    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $cat = $_POST['category'];
        $serve = $_POST['service'];
        $style = $_POST['stylist'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $contact = $_POST['telephone'];

        $query = "INSERT INTO booking (category, service, stylist, contact, date, time) VALUES ('$cat','$style','$serve','$date','$time','$contact')";
        $result = mysqli_query($my_connection, $query);
        if($result){
            $url = "https://apps.mnotify.net/smsapi";

            // Define the recipient number
            $recipient = $contact;
            $user = $name;
            $message =  $user + '!Welcome to Page1Salon. You successfully booked an appointment.';
        
            // Define the parameters
            $params = [
                'key' => '3w72C56POeMmp07tBxyVzS2Wj',
                'to' => $recipient,
                'msg' => $message,
                'sender_id' => 'Page1Salon'
            ];
        
            // Create a new curl session
            $curl = curl_init();
        
            // Set the curl options
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
            // Execute the curl request
            $response = curl_exec($curl);
        
            // Close the curl session
            curl_close($curl);
            //call sms api
            //https://apps.mnotify.net/smsapi?key=3w72C56POeMmp07tBxyVzS2Wj&to={}&msg=+233201209873&sender_id=Page1Salon
            echo "<script> alert('successfully Booked. You will recieved an SMS shortly');window.location.href='../HTML/Booking.html';</script>" ;
        }
        else{
            echo "<script>alert('Wrong information.Try Again');window.location.href='../HTML/Booking.html';</script>" . mysqli_error($my_connection);
        }
    }

    $code = "SELECT * FROM booking";
    $code2 = "SELECT FullName FROM signup";
    $info = $my_connection->query($code);
    $info2 = $my_connection->query($code2);

    while($col = $info->fetch_assoc()){
        while($col2 =$info2->fetch_assoc() ){
        echo "
            Mr/Miss. $col2[FullName] has successfully booked <br>
            Category: $col[category] <br>
            Service: $col[service] <br>
            Stylist: $col[stylist] <br>
            Date: $col[date] <br>
            Time: $col[time] <br>
            Contact: $col[time] <br>
            <a href='Booking.php?delete_id=$col[ID]'>Delete</a> <br>
        ";
        }
    }
    if(isset($_GET['delete_id'])){
        $delete = $_GET['delete_id'];

        // prepare and execute the delete query
        $code = "DELETE FROM signup Where ID = ?";
        $conn = $my_connection -> prepare($code);
        $conn-> bind_param("i", $delete);

        if ($conn->execute()){
            echo "<script >alert('Successfully deleted'); window.location='../Booking.html';</script>";
        }else{
            echo "<script >alert('Error');</script>";
        }
        // close the statement
        $conn -> close();
    }




?>