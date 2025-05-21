<?php

session_start();

require './includes/db.php';


//only redirect the user if the code is verified and email is passed
if(!isset($_SESSION['emailAddress']) || !isset($_SESSION['reset_code_verified']) || !$_SESSION['reset_code_verified']){
  header('Location: ./enter_code.php');
  exit();

}


//this is where we will reset our password
if($_SERVER['REQUEST_METHOD']==='POST'){

  //passed the value of our form below into new variables
  $customerPassword = $_POST['customerPassword'];
  $confirmPassword = $_POST['confirmPassword'];

  if($customerPassword === $confirmPassword){

    //if the password is the same then lets hash the password
    $hashedPassword = password_hash($customerPassword,PASSWORD_BCRYPT);

    //lets update the user its new password
    $stmt = $pdo->prepare("UPDATE customer SET customerPassword = ? WHERE emailAddress = ?");
    $stmt->execute([$hashedPassword, $_SESSION['emailAddress']]);
    
    
    //lets unset the variable and clear
    unset($_SESSION['emailAddress']);
    unset($_SESSION['reset_code_verified']);
    session_regenerate_id(true);


    //lets redirect to login page after
    $_SESSION['success']='Your password has been reset successfully.';
    header('Location: ./login.php');
    exit();

  }else{
    $_SESSION['error']='Passwords do not match. Please try again.';
    header('Location: ./reset_password.php');
    exit(); 
  }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Code</title>
    <script src="./bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card mb-3" style="max-width: 540px;box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
          <div class="row no-gutters">
            <div class="col-md-4 d-flex align-items-center">
              <img src="./images/Lexsuz_logo.jpg" class="img-fluid" alt="Lexsuz Hotel Logo" style="object-fit: contain; max-height: 200px; width: 100%; padding: 10px;">
            </div>
            <div class="col-md-8">
              <div class="card-body">

                <form action="./reset_password.php" method="POST">
                  <small class="text-muted">Lexsuz Hotel</small>
                  <h5 class="card-title mt-1">Reset Password</h5>
                  <?php
                    if (isset($_SESSION['error'])){
                      echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
                      unset($_SESSION['error']);
                    } 

                    if(isset($_SESSION['success'])){
                      echo '<div class="alert alert-success"role="alert">'.$_SESSION['success'].'</div>';
                      unset($_SESSION['success']);
                    }
                  ?>
                  <input name="customerPassword" class="form-control mb-3" type="password" minlength="8" placeholder="Enter New Password" required>
                  <input name="confirmPassword" class="form-control mb-3" type="password" minlength="8" placeholder="Confirm Password" required>
                  <button class="btn btn-info w-100" type="submit" style="background-color: #e88500; color: #1a1a1a; border:2px solid silver;">Reset</button>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
</html>