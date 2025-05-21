<?php
session_start();

require '../includes/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staffID = $_POST['staffID'];
    $staffName = $_POST['staffName'];

    $stmt = $pdo->prepare('SELECT * FROM staff WHERE staffID = ? AND staffName = ?');
    $stmt->execute([$staffID, $staffName]);
    $staff = $stmt->fetch(PDO::FETCH_ASSOC);

    if($staff) {
        // Login successful
        $_SESSION['staffID'] = $staff['staffID'];
        $_SESSION['staffName'] = $staff['staffName'];
        $_SESSION['staffRole'] = $staff['role'];
        
        // Redirect to dashboard
        header('Location: ./staff_dashboard.php');
        exit();
    } else {
        $_SESSION['error'] = "Invalid staff ID or name";
        header('Location: ./staff_login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login - Lexsuz Hotel</title>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <style>
        .btn-custom {
            background-color: #e88500;
            color: #1a1a1a;
            border: 2px solid silver;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #d67b00;
            color: #000;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card mb-3" style="max-width: 540px;box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
      <div class="row no-gutters">
        <div class="col-md-4 d-flex align-items-center">
          <img src="../images/Lexsuz_logo.jpg" class="img-fluid" alt="Lexsuz Hotel Logo" style="object-fit: contain; max-height: 200px; width: 100%; padding: 10px;">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <form action="./frontdesk_index.php" method="POST">
              <small class="text-muted">Lexsuz Hotel</small>
              <h5 class="card-title mt-1">Staff Login</h5>
              <?php
                  if (isset($_SESSION['error'])) {
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
                    unset($_SESSION['error']);
                  } 

                  if(isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
                  }
                ?>
              <div class="form-group">
                <input name="staffID" class="form-control mb-3" type="text" placeholder="Staff ID" aria-label="Staff ID" required>
              </div>
              <div class="form-group">
                <input name="staffName" class="form-control mb-3" type="text" placeholder="Staff Name" aria-label="Staff Name" required>
              </div>
              <button class="btn btn-custom w-100" type="submit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>