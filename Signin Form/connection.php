<?php
    $fullName = $_POST['fullName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phNumber = $_POST['phNumber'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender = $_POST['gender'];

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if($conn->connect_error){
        die('Connection Failed :' .$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(fullName, dob, email, phNumber, username, password, confirmPassword, gender) values(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssissss", $fullName, $dob, $email, $phNumber, $username, $password, $confirmPassword, $gender);
        $stmt->execute();
        echo "Registration Successful...";
        $stmt->close();
        $conn->close();
    }
?>
