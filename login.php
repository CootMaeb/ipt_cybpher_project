<?php
session_start();

require __DIR__ . './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$siteKey = $_ENV['RECAPTCHA_SITE_KEY'] ?? '';  // Added null coalescing
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Load Bootstrap first -->
    <link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <script src="./bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <!-- Then your custom CSS -->
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <main>
      <!-- Login START -->
        <div class="card logininfo-card mb-3 login-card">
            <div class="row g-0 h-100">
              <!-- Form Section -->
              <div class="col-md-6 d-flex flex-column">
                <div class="card-body p-4 p-lg-4 h-100 d-flex flex-column">
                  <div class="text-center mb-3">
                    <span style="color: #ffa800; font-weight:bolder;">Lexsu</span><span style="color: #424242;font-weight:bolder;">z Hotel</span>
                    <p class="tagline text-muted mb-3" style="font-size: larger;"><strong>LOG-IN</strong></p>
                  </div>
                  
                  <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                      <?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
                    </div>
                  <?php endif; ?>

                  <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success" role="alert">
                      <?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
                    </div>
                  <?php endif; ?>

                  <form class="login-form flex-grow-1 d-flex flex-column" action="./login_validate.php" method="POST">
                    <div class="mb-2">
                      <label for="username" class="form-label small mb-1">Username</label>
                      <input name="username" type="text" class="form-input form-control py-2 px-2" id="username" placeholder="Enter your username" required>
                    </div>
                    
                    <div class="mb-3">
                      <label for="customerPassword" class="form-label small mb-1">Password</label>
                      <input name="customerPassword" type="password" class="form-input form-control py-2 px-2" id="customerPassword" placeholder="Enter your password" required>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label small" for="rememberMe">Remember me</label>
                      </div>
                      <a href="./forget_password.php" class="text-decoration-none small">Forgot Password?</a>
                    </div>
                    
                    <?php if (!empty($siteKey)): ?>
                    <div class="m-3 text-center">
                      <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars($siteKey) ?>"></div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="mt-auto">
                      <div class="mb-2">
                        <button type="submit" class="bnt-edit btn-login-edit btn w-100 py-2 mb-2">Login</button>
                        <a href="./signup.php" class="btn btn-light border w-100 py-2 mb-2 text-decoration-none">Register</a>
                      </div>
          
                      <div class="position-relative my-2">
                        <hr class="my-2 mx-0">
                      </div>
                      
                      <div>
                        <p class="text-muted text-center mb-2 small btn btn-outline-danger w-100"><a href="googleAuth/google-login.php" style="text-decoration: none;"><i class="mdi mdi-google me-2" style="color: #ffa800;">or Sign in with Google</i></a></p>
                        <button type="button" class="google-btn btn btn-light w-100 border py-2 d-flex align-items-center justify-content-center">
                          <img class="googlelogo-photo mr-2" src="./images/google_logo.png" alt="Google logo" style="height: 20px;">
                          Continue with Google
                        </button>
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
    </main>

    <?php if (!empty($siteKey)): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif; ?>
</body>
</html>