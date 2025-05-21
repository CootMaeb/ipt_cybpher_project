<?php
session_start();
require '../includes/db.php';

// Set your success message here
$_SESSION['success'] = "Your booking has been recorded successfully!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #ffa800; height: 4.5rem; padding: 0 1rem;">
    <div class="container-fluid">
        <!-- Brand/Logo Section -->
        <div style="font-family: 'Poppins'; font-weight: 900; font-size: larger;">
            <a class="navbar-brand" href="#">
                <span style="color: white;">Lexsu</span><span style="color: #424242;">z Hotel</span>
            </a>
        </div>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Main Navigation -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-dark" href="./user_index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="./user_room.php">Room</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="./user_index.php#about_us-section">About Us</a></li>
            </ul>

            <!-- Right-aligned items -->
            <div class="d-flex align-items-center">
                <p><a href="./myBooking.php" class="me-3 d-md-inline bookingLink" style="color:#424242;text-decoration:none;">My Booking |</a></p>
                <a href="#">
                    <img src="../images/prof_uiman.png" style="height: 45px; width: 45px;" alt="Profile Picture">
                </a>
            </div>
        </div>
    </div>
</nav>

    <main>
        <div class="d-flex justify-content-center align-items-center" style="height: 77vh;">
            <div class="card mb-3" style="max-width: 540px;box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex align-items-center">
                        <img src="../images/Lexsuz_logo.jpg" class="img-fluid" alt="Lexsuz Hotel Logo" style="object-fit: contain; max-height: 200px; width: 100%; padding: 10px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            
                                <?php if(isset($_SESSION['success'])): ?>
                                    <div class="alert alert-success" role="alert">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        <?php 
                                            echo $_SESSION['success']; 
                                            unset($_SESSION['success']);
                                        ?>
                                        <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                           
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
     <!-- div is for the background color below '#ffa800' -->
      <div></div> 
      <img src="../images/cpany_logo.png" alt="Company Logo">
    </footer>

    
</body>
</html>