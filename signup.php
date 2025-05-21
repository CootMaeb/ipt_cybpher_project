<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <script src="./bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <main>
        <div class="card logininfo-card mb-3 login-card">
            <div class="row g-0 h-100">
              <div class="col-md-6 d-flex flex-column">
                <div class="card-body p-4 p-lg-4 h-100 d-flex flex-column">
                  <div class="text-center mb-3">
                    <img class="login-logo img-fluid mb-2" src="./images/Lexsuz_logo.jpg" alt="Lexsuz Logo" style="max-height: 58px;">
                    <p class="tagline text-muted mb-3" style="font-size: larger;"><strong>SIGNUP</strong></p>
                  </div>

                  <?php if (isset($_SESSION['error'])): ?>
                  <div class="alert alert-danger" role="alert">
                    <?=$_SESSION['error']; unset($_SESSION['error']); ?>
                  </div>
                  <?php endif; ?>

                  <form class="login-form d-flex flex-column" action="./signup_validate.php" method="POST">
                    <div class="mb-2">
                      <label for="name" class="form-label small mb-1">Name</label>
                      <input name="name" type="text" class="form-input form-control py-2 px-2" id="name" placeholder="Type your full name here" required>
                    </div>
                    <div class="mb-2">
                      <label for="phoneNumber" class="form-label small mb-1">Phone Number</label>
                      <input name="phoneNumber" type="tel" class="form-input form-control py-2 px-2" id="phoneNumber" placeholder="Your contact number here" required>
                    </div>
                    <div class="mb-2">
                      <label for="emailAddress" class="form-label small mb-1">Email Address</label>
                      <input name="emailAddress" type="email" class="form-input form-control py-2 px-2" id="emailAddress" placeholder="Let's keep in touch — your email?" required>
                    </div>
                    <div class="mb-2">
                      <label for="username" class="form-label small mb-1">Username</label>
                      <input name="username" type="text" class="form-input form-control py-2 px-2" id="username" placeholder="What should we call you?" required>
                    </div>
                    <div class="mb-2">
                      <label for="customerPassword" class="form-label small mb-1">Password</label>
                      <input name="customerPassword" type="password" minlength="8" class="form-input form-control py-2 px-2" id="customerPassword" placeholder="Create a strong password" required>
                    </div>
                    <div class="mb-2">
                      <label for="confirmPassword" class="form-label small mb-1">Confirm Password</label>
                      <input name="confirmPassword" type="password" minlength="8" class="form-input form-control py-2 px-2" id="confirmPassword" placeholder="Re-enter your password" required>
                    </div>
                    <div class="mt-auto">
                      <div class="mb-2">
                      <button type="submit" class="bnt-edit btn-login-edit btn w-100 py-2 mb-2">Signup</button>
                        <p class="text-center mt-3"> <a href="./login.php" class="text-primary">Already have an account?</a></p>
                      </div>
                  </div>
                  </form>
                  
                </div>
              </div>
              <!-- Image Section -->
              <div class="col-md-6 login-image-section h-100" style="position:relative; overflow:hidden;">
                <div class="circle position-absolute top-0 start-50 translate-middle"></div>
                <img class="login-image img-fluid h-100 w-100 rounded-end" src="./images/Lexsuz_logo.jpg" alt="Login Image" style="object-fit: cover; object-position: center;">
              </div>
            </div>
          </div>
          <!-- for Login END-->
    </main>
</body>
</html>
