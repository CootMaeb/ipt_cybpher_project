<?php

session_start();


require 'includes/db.php';

if($_SERVER['REQUEST_METHOD']==='POST'){

    $recaptchaSecret = $_ENV['RECAPTCHA_SECRET_KEY'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");
    
    $captchaSuccess = json_decode($verify);
    

    if (!$captchaSuccess) {
        $_SESSION['error'] = "Captcha verification failed. Please try again.";
        header('Location: ./login.php');
        exit();
    }

    $username=$_POST['username'];
    $password=$_POST['customerPassword'];

    $stmt = $pdo->prepare("SELECT * FROM customer WHERE username = ?");
    $stmt->execute([$username]);
    $customer=$stmt->fetch(PDO::FETCH_ASSOC);

    if($customer && password_verify($password, $customer['customerPassword'])){
        //To store the customer data in session
        $_SESSION['customer_id'] = $customer['customerID'];
        $_SESSION['username'] = $customer['username'];
        $_SESSION['logged_in'] = true;

        header('Location: ./for_user/user_index.php');
        exit();
    }else{
        $_SESSION['error'] = "Invalid username and password.";
        header('Location: ./login.php');
        exit();
      
    }
}
?>