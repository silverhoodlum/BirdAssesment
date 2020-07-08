<?php

    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Database connection   
    $conn = new mysqli('localhost', 'root', '', 'birdservicesform_database');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        if($stmt = $conn->prepare("insert into formsubmission(fullName, phone, email, message) VALUES(?,?,?,?)")){
        
        $stmt->bind_param("siss", $fullName, $phone, $email, $message);
        $stmt->execute();
        echo "Message sent. Will be in contact with you shortly";
        $stmt->close();
        $conn->close();
        }else{
            die("Errormessage: ". $conn->error);
        }
    }
?>