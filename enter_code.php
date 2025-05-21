<?php
  session_start();

  require './includes/db.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $enteredCode = $_POST['verificationCode']; //This is from the form of our HTML pass it in a new variable.

    $emailAddress = $_SESSION['emailAddress']; //We store the email from the forgot password page in a session.

    if(!isset($_SESSION['emailAddress'])){ //if not found or not passed.
      $_SESSION['error'] = "No Email session found; Please try again"; //if the user access the entered code without email it will redirect to forgot password page.
      header('Location: ./forget_password.php');
      exit();
    }

    //now lets fetch the code from the database
    $stmt = $pdo->prepare("SELECT reset_code FROM customer WHERE emailAddress = ?");
    $stmt->execute([$emailAddress]); //call the user with the same email and has the code
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user){
      //lets check if the entered code matches with the code stored in the database.
      
      if($enteredCode === $user['reset_code']){
        //let store the session in a new variable to be passed on our reset pages.
        $_SESSION['reset_emailAddress']=$emailAddress;
        $_SESSION['reset_code_verified'] = true; //We will add an indication that the code is verified.

        header('Location: ./reset_password.php');
        exit();
      }else{
        $_SESSION['error']="Invalid Code. Please try again.";
      }

    }else{
      $_SESSION['error'] = "No user found with that email";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Code</title>
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

                <form action="./enter_code.php" method="POST">
                  <small class="text-muted">Lexsuz Hotel</small>
                  <h5 class="card-title mt-1">Enter Verification Code</h5>
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
                  <input name="verificationCode" class="form-control mb-3" type="text" placeholder="Enter verification code" required>
                  <button class="btn btn-info w-100" type="submit" style="background-color: #e88500; color: #1a1a1a; border:2px solid silver;">Verify Code</button>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
</html>