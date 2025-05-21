<?php
  session_start();

  require './includes/db.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require './vendor/autoload.php';

  if($_SERVER['REQUEST_METHOD']=== 'POST'){

    $emailAddress =$_POST['emailAddress'];

    $stmt=$pdo->prepare('SELECT * FROM customer WHERE emailAddress = ?');
    $stmt->execute([$emailAddress]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
      $reset_code=rand(100000, 999999);

      $update=$pdo->prepare("UPDATE customer SET reset_code=? WHERE emailAddress = ?");
      $update->execute([$reset_code,$emailAddress]);

      $_SESSION['emailAddress']=$emailAddress;

      $mail=new PHPMailer(true);

      try{
        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'maeb23888@gmail.com';
        // This is your 16 Digit App Password.
        $mail->Password = 'ybku xxtw zvte bccb';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
       

        $mail->setFrom('maeb23888@gmail.com','Maevyel Coot');
        $mail->addAddress($emailAddress, 'customer'); 

        $mail->isHTML(true);
        $mail->Subject="Password Reset Code";

        $mail->Body="
          <p>Hello, this is your password <br> Reset Code:{$reset_code}</p>
        ";

        $mail->AltBody="Hello, use the code below to reset your password: {$reset_code}\n\n";
        $mail->send();

        $_SESSION['email_sent'] = true;

        $_SESSION['success']="A verification code has been sent to your email";
        header('Location: ./enter_code.php');
        exit();


      }catch(Exception $e){
        $_SESSION['error']="Message could not be sent.";
        header('Location: ./forget_password.php');
        exit();
      }

    }else{
      $_SESSION['error']="No user found with that email.";
      header('Location: ./forget_password.php');
      exit();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

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

         
            <form action="./forget_password.php" method="POST">
              <small class="text-muted">Lexsuz Hotel</small>
              <h5 class="card-title mt-1">Forgot Password</h5>
              <?php
                  if (isset($_SESSION['error'])){
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
                    unset($_SESSION['error']);
                  } 

                  if(isset($_SESSION['success'])){
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
                  }
                ?>
              <input name="emailAddress" class="form-control mb-3" type="email" placeholder="Enter your email"  aria-label="Email input" required>
              <button class="btn btn-info w-100" type="submit" style="background-color: #e88500 ; color: #1a1a1a; border:2px solid silver;">Send Verification Code</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>