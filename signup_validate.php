<?php

session_start();

require './includes/db.php';

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $fullname = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $emailAddress = $_POST['emailAddress'];
    $username = $_POST['username'];
    $customerPassword = $_POST['customerPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if($customerPassword !== $confirmPassword){
        $_SESSION['error']="Password do not match.";
        header('Location: ./signup.php');
        exit();
    }

    $stmt=$pdo->prepare("SELECT * FROM customer WHERE username = ?");
    $stmt->execute([$username]);

    if($stmt->rowCount()>0){
        $_SESSION['error']="Username already exists.";
        header('Location: ./signup.php');
        exit();
    }

    $hashedPassword=password_hash($customerPassword, PASSWORD_DEFAULT);
    $stmt=$pdo->prepare("INSERT INTO customer(fullname,phoneNumber,emailAddress,username,customerPassword) VALUES(?, ?, ?, ?, ?)");
    

    if ($stmt->execute([$fullname, $phoneNumber, $emailAddress, $username, $hashedPassword])) {
        $_SESSION['success'] = "Your account has been created. You can now login.";
        header('Location: ./login.php');
        exit();
    }else {
        echo("There was an error creating your account.");
        exit();
    }
}

?>