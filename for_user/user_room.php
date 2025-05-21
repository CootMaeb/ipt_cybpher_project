<?php
  session_start();
  require '../includes/db.php';

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookingType = $_POST['bookingType'];
    $check_in_Date = $_POST['check_in_Date'];
    $check_out_Date = $_POST['check_out_Date'];
    $roomID = $_POST['roomID'];
    
    // Get customerID from session
    $customerID = $_SESSION['customerID'] ?? $_SESSION['customer_id'] ?? null;

    // Insert a booking
    $insert = $pdo->prepare('INSERT INTO booking 
                           (bookingType, check_in_Date, check_out_Date, customerID, roomID, bookingStatus) 
                           VALUES (?, ?, ?, ?, ?, "pending")');
    
    if($insert->execute([$bookingType, $check_in_Date, $check_out_Date, $customerID, $roomID])) {
        $_SESSION['success'] = "Booking request submitted successfully";
        header("Location: ./bookingConfirmation.php");
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong";
        header("Location: ./user_room.php");
        exit();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="./style.css">



</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top user-navbar">
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
                <li class="nav-item"><a class="nav-link" href="./user_index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="./user_room.php">Room</a></li>
                <li class="nav-item"><a class="nav-link" href="./user_index.php#about_us-section">About Us</a></li>
            </ul>
            
            <!-- Right-aligned items -->
            <div class="d-flex align-items-center">
              <p><a href="./myBooking.php" class="me-3 d-md-inline bookingLink">My Booking |</a></p>
                <a href="#">
                    <img src="../images/prof_uiman.png" class="user-profile" alt="Profile Picture">
                </a>
            </div>
        </div>
    </div>
</nav>
      
    <main>
      
      <section>
        <div class="text-center"style="margin-bottom: 3rem; margin-top:2rem;">
          <p  class="fw-bold"style="color:#ffa800; font-size: 1.5rem;">+++++++Room+++++++</p>
        </div>
      </section>

      <!-- Start Standard Room A & B-->
       <!-- Start Standard Room A -->
      <section class="container py-4"style="position: relative;">
        <div class="text-center stadard-aNb-text">
          <h5>Standard Room</h5>
        </div>
        <div class="card standard-aNb-imgContainer" style="">
          <div class="row g-0 ">
            <div class="col-md-4">
              <img src="../images/A03_standard_a.jpg" class="img-fluid rounded-start standard-aNb-img" alt="Hotel Room">
            </div>

            <div class="col-md-8">
              <div class="card-body h-100" style="padding: 2rem;">
                <h5 class="card-title userRoom-fortext" >
                  <span style="color: #424242;">Standard Room A</span>
                </h5>
                <p class="userRoom-fordescription">
                  Cozy and comfortable, Standard Room A offers a peaceful retreat 
                  with all the essentials for a pleasant stay. Ideal for solo travelers or couples, 
                  it features a snug bed, modern amenities, and a warm ambiance that makes you feel right at home.
                </p>
                <div class="btn position-absolute userRoom-btnDiv">
                  <button class="btn userRoom-btn" data-bs-toggle="offcanvas" data-bs-target="#forbooking" aria-controls="staticBackdrop">
                    <h5 class="card-text text-center m-0" style="color:#424242;">
                      ₱1,000<small style="font-size: small;">/night</small>
                    </h5>
                  </button>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- End Standard Room A  -->


        <!-- Start Standard Room B -->
        <div class="card mb-3 .standard-aNb-imgContainer">
          <div class="row g-0 ">
            <div class="col-md-4">
              <img src="../images/A04_standard_b.jpg" class="img-fluid rounded-start standard-aNb-img" alt="Hotel Room">
            </div>

            <div class="col-md-8">
              <div class="card-body h-100" style="padding: 2rem;">
                <h5 class="card-title userRoom-fortext">
                  <span style="color: #424242;">Standard Room B</span>
                </h5>
                <p class=".userRoom-fordescription">
                Similar in charm to Room A, Standard Room B offers a slightly different 
                layout with the same cozy comforts. Perfect for a short stay, it includes a 
                comfortable bed, a compact workspace, and thoughtful touches for convenience and relaxation.
                </p>
                <div class="btn position-absolute userRoom-btnDiv">
                  <button class="btn userRoom-btn" data-bs-toggle="offcanvas" data-bs-target="#forbooking" aria-controls="staticBackdrop">
                    <h5 class="card-text text-center m-0" style="color:#424242;">
                      ₱1,200<small style="font-size: small;">/night</small>
                    </h5>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
      <!-- End of the Standard Room B -->
      <!-- End Standard Room A & B -->

      
      <!-- Start Classic Queen -->
      <section class="container py-4"style="position: relative;margin-top:2rem;">
        <div class="text-center stadard-aNb-text">
          <h5>Classic Queen</h5>
        </div>
        <div class="card standard-aNb-imgContainer">
          <div class="row g-0 ">
            <div class="col-md-4">
              <img src="../images/A01_classic_queen.jpg" class="img-fluid rounded-start standard-aNb-img" alt="Hotel Room">
            </div>

            <div class="col-md-8">
              <div class="card-body h-100" style="padding: 2rem;">
                <h5 class="card-title userRoom-fortext">
                  <span style="color: #424242;">Classic Queen</span>
                </h5>
                <p class=".userRoom-fordescription">
                  Timeless and elegant, the Classic Queen room features a plush queen-sized bed, tasteful decor, and enhanced amenities. 
                  This room is perfect for couples or business travelers seeking a balance of comfort and style.
                </p>
                <div class="btn position-absolute userRoom-btnDiv">
                  <button class="btn userRoom-btn"data-bs-toggle="offcanvas" data-bs-target="#forbooking" aria-controls="staticBackdrop">
                    <h5 class="card-text text-center m-0" style="color:#424242;">
                      ₱1,500<small style="font-size: small;">/night</small>
                    </h5>
                  </button>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Classic Queen -->

      <!-- Start Superior Twin -->
      <section class="container py-4"style="position: relative;margin-top:2rem;">
        <div class="text-center stadard-aNb-text">
          <h5>Superior Twin</h5>
        </div>
        <div class="card standard-aNb-imgContainer">
          <div class="row g-0 ">
            <div class="col-md-4">
              <img src="../images/A02_superior_twin.jpg" class="img-fluid rounded-start standard-aNb-img" alt="Hotel Room">
            </div>

            <div class="col-md-8">
              <div class="card-body h-100" style="padding: 2rem;">
                <h5 class="card-title userRoom-fortext">
                  <span style="color: #424242;">Superior Twin</span>
                </h5>
                <p class="userRoom-fordescription">
                  Spacious and versatile, the Superior Twin room includes two comfortable twin beds, making it a great choice for 
                  friends or family. With extra space and upgraded features, it offers a refined setting for a restful stay.
                </p>
                <div class="btn position-absolute userRoom-btnDiv" style="right:0; bottom: 0; margin:20px; color:#ffa800">
                  <button class="btn userRoom-btn" data-bs-toggle="offcanvas" data-bs-target="#forbooking" aria-controls="staticBackdrop">
                    <h5 class="card-text text-center m-0" style="color:#424242;">
                      ₱1,500<small style="font-size: small;">/night</small>
                    </h5>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Superior Twin -->

       <!-- For Booking -->
       <div class="offcanvas offcanvas-start " data-bs-backdrop="static" tabindex="-1" id="forbooking" aria-labelledby="staticBackdropLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold" id="staticBackdropLabel" style="color:#ffa800; ">Book Now!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
         
          <?php if(isset($_SESSION['error'])): ?> 
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
          <?php endif; ?>

          <?php if (isset($_SESSION['success'])): ?>
                  <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                  </div>
          <?php endif; ?>

            <form id="booking" method="POST" action="">
              <div class="m-3">
              <label for="bookingType" class="form-label">Would you like to make a walk-in booking or book online?</label>
              <select class="form-control" id="bookingType" name="bookingType" required>
              
                <option value="online">Online</option>
                <option value="walk-in">Walk-in</option>
              </select>
              </div>  

              <div class="m-3">
              <label for="check_in_Date" class="form-label">What date will you be checking in?</label>
              <input type="date" class="form-control" id="check_in_Date" name="check_in_Date" min="<?= date('Y-m-d') ?>" required>
              </div>

              <div class="m-3">
              <label for="check_out_Date" class="form-label">What date will you be checking out?</label>
              <input type="date" class="form-control" id="check_out_Date" name="check_out_Date" required>
              </div>

              <div class="m-3">
              <label for="roomID" class="form-label">Please select your room type:</label>
              <select class="form-control" id="roomID" name="roomID" style="color: #424242; background-color: #ffffff;" required>
                
                <?php
          
                  $stmt = $pdo->prepare("SELECT roomID, roomType FROM room");
                  $stmt->execute();
                  $rooms = $stmt->fetchAll();
                    foreach ($rooms as $room) {
                      echo '<option value="' . htmlspecialchars($room['roomID']) . '">' 
                          . htmlspecialchars($room['roomType']) . '</option>';
                    }
                ?>
                </select>
                </div>

              
              <input type="hidden" name="customerID" value="<?= htmlspecialchars($_SESSION['customerID'] ?? '') ?>">
              <div class="m-4">
                <button type="submit" class="btn" style="background-color: #ffa800; padding: 10px;">Submit Booking</button>
               </div>

            </form>
          </div>
        </div>


    </main>
    <footer>
      <!-- div is for the background color below '#ffa800' -->
      <div style=" "></div> 
      <img src="../images/cpany_logo.png" alt="Company Logo">
    </footer>
    
</body>
</html>