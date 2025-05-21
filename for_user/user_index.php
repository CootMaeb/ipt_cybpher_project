<?php

session_start();


require '../includes/db.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Landing Page</title>
    
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
                <li class="nav-item"><a class="nav-link" href="#about_us-section">About Us</a></li>
            </ul>
            <!-- Right-aligned items -->
            <div class="d-flex align-items-center">
                <p ><a href="./myBooking.php" class="me-3 d-md-inline bookingLink">My Booking |</a></p>
                <a href="#">
                    <img src="../images/prof_uiman.png" class="user-profile" alt="Profile Picture">
                </a>
            </div>
        </div>
    </div>
</nav>
      
    <main>
      <!-- Upper Presentation -->
      <section class="container py-4 upperPresentation-container">
        <div class="container-ndex childUP">
          <!-- Text Container -->
          <div class="text-center w-100 titleLex-text">
            <h3 class="text-muted" style="font-size: 1.2rem">Unforgettable warm stay at</h3>
            <h1 class=" fw-bold edit-lexsuzHotel">Lexsuz Hotel</h1>
          </div>
      
          <!-- Image Container -->
          <div class="row w-100 m-0 edit-imageContainer">
            <div class="col-12 h-100 p-0 edit-imageChild">
              <img src="../images/index_samplemain.png" class="rounded shadow edit-imageBunso" alt="Lexsuz Hotel">
            </div>
          </div>
          
          <!-- Fake Navigation -->
          <div class="position-absolute w-100 edit-fakenav">
            <nav class="d-flex justify-content-between align-items-center bg-white rounded shadow-sm edit-childFakenav">
              <div class="d-flex align-items-center">
                <img src="../images/icon_location.png" class="edit-imageFakenav" style="margin-left:3px;" class="me-2" alt="Location icon">
                <p class="mb-0 small text-center">Capitol Grounds, Malaybalay City, <br>Philippines</p>
              </div>
              
              <div class="d-flex align-items-center">
                <p class="mb-0 me-2 small text-center">Come find us! <br>We are always open!</p>
                <img src="../images/icon_search.png" class="edit-imageFakenav" style="margin-right:3px;" alt="Search icon">
              </div>
            </nav>
          </div>
      
          <!-- Book now button -->
          <div class="position-absolute d-grid gap-2 mx-auto mb-3 bookNow-container">
            <button type="button" class="btn bnt bookNow-text">Book Now</button>
          </div>
        </div>
      </section>
      <!-- End of the Presentation -->

      <!-- Start Room Section -->
      <section id="room-section" class="container py-4 divider-section">
        <div class="text-center"style="margin-bottom: 4rem;">
          <p class="display-8 title-divider">+++++++Room+++++++</p>
        </div>
        
        <div class="forRoom-container">
          <!-- Card 1 -->
          <div class="card edit-forRoomCard" style="box-shadow: -5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <img src="../images/A03_standard_a.jpg" class="card-img-top edit-forRoomImage" alt="Standard Room">
            <h6 class="edit-forRoomTitle">Standard Room</h6>
            <div class="card-body">
              <h3 class="card-text text-center"style="color:#424242;">₱1,000<small style="font-size: small;">/night</small></h3>
            </div>
          </div>
          
          <!-- Card 2 -->
          <div class="card edit-forRoomCard" style="box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <img src="../images/A01_classic_queen.jpg" class="card-img-top  edit-forRoomImage" alt="Standard Room">
            <h6  class="edit-forRoomTitle">Classic Queen</h6>
            <div class="card-body">
              <h3 class="card-text text-center"style="color:#424242;">₱1,500<small style="font-size: small;">/night</small></h3>
            </div>
          </div>
          
          <!-- Card 3 -->
          <div class="card edit-forRoomCard" style="box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <img src="../images/A02_superior_twin.jpg" class="card-img-top  edit-forRoomImage" alt="Standard Room">
            <h6 class="edit-forRoomTitle">Superior Twin</h6>
            <div class="card-body">
              <h3 class="card-text text-center"style="color:#424242;">₱1,500<small style="font-size: small;">/night</small></h3>
            </div>
          </div>
        </div>
      </section>
      <!-- End Room Section -->

      <!-- Start About Us -->
      <section id="about_us-section" class="container py-4 divider-section">
        <div class="text-center" style="margin-bottom: 4rem;">
          <p class="display-8 title-divider">+++++++About Us+++++++</p>
        </div>
      
        <!-- About the Lexsuz Hotel -->
        <div class="aboutLexsuz-container">
          <!-- Image on the left -->
          <div class="aboutLexsuz-imageOne">
            <img class="aboutLexzus-image" src="../images/Lexsuz_logo.jpg" alt="Lexsuz Hotel" >
          </div>
          
          <!-- Text content on the right -->
          <div>
            <h4 class=" fw-bold" style="margin-bottom: 4rem;">
              <span style="color: #ffa800; font-size: larger;">Lexsu</span><span style="color: #424242; font-size: larger;">z Hotel</span>
            </h4>
            <p class="aboutLexsuz-description">
              Welcome to Lexsus Hotel, a charming and cozy escape located near the Capitol Grounds in 
              Malaybalay City. Our small hotel offers a warm, welcoming atmosphere perfect for both business
               and leisure travelers seeking comfort and convenience in the heart of Bukidnon.
            </p>
          </div>
        </div>
      
        <!-- Why choose Lexsuz Hotel- -->
        <div class="aboutLexsuz-container"style="margin-top:30px;">
          <!-- Text content on the left -->
          <div style="flex:1; order: 1; ">
            <h4 class=" fw-bold" style="margin-bottom: 4rem;">
              <span style="color: #424242;font-size: larger;">Why choose us?</span>
            </h4>
            <p class="lexsuz-description">
              Just a short walk from parks, and local attractions, our location makes it easy to explore the best
               of Malaybalay. Guests can enjoy clean, well-appointed rooms, personalized service, and a relaxing environment
                designed for rest and rejuvenation. Whether you're staying for a night or an extended visit, Lexsus Hotel is your 
                ideal starting point in the city.
            </p>
            
          </div>
      
          <!-- Image on the right -->
          <div style="flex: 0; order: 2; border-radius: 8px; box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <img class="aboutLexzus-image" src="../images/A05_hotel.jpg" alt="Lexsuz Hotel" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
          </div>
        </div>
      </section>
      <!-- End About Us -->

      <!-- Start Cafe and Restaurant -->
      <section class="container py-4 divider-section" >
        <div class="text-center" style="margin-bottom: 4rem;">
          <p class="display-8 title-divider" >+++++++Cafe and Restaurant+++++++</p>
        </div>
      
        <div class="card mb-3 cafeNresto-child">
          <div class="row g-0 ">
            <div class="col-md-4">
              <img src="../images/A06_cafeNresto.jpg" class="img-fluid rounded-start cafeNresto-image" alt="Hotel Room">
            </div>
            <div class="col-md-8">
              <div class="card-body h-100" style="padding: 2rem;">
                <h5 class="card-title cafeNresto-title">
                  <span style="color: #424242;">Cafe and Rest</span><span style="color: #ffa800;">aurant</span>
                </h5>
                <p class="lexsuz-description"style="margin-bottom: 1rem;">
                  Lexsuz Hotel is a small and friendly hotel with comfortable rooms. It has a cozy café where you
                    can enjoy coffee and snacks. The restaurant offers tasty local meals.
                     It is a great place to stay for both tourists and business guests.
                </p>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
      <!-- End Cafe amd Restaurant -->

      <!-- Start Review -->
      <section class="container py-4 divider-section">
        <div class="text-center" style="margin-bottom: 4rem;">
          <p class="display-8 title-divider">+++++++Review+++++++</p>
        </div>
        <section class="container py-4">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- First Card -->
            <div class="col">
              <div class="card h-100 position-relative">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-2">
                    <img src="../images/prof_maev.png" class="rating-prof" alt="Profile Picture">
                    <h6 class="card-title mb-0">Maevyel Coot</h6>
                  </div>
                  <img src="../images/rating_1.png" class="rating-star" alt="Rating">
                  <p class="card-text rating-review">  
                    "I had a lovely stay at this hotel! The room was clean and cozy, and the staff were very friendly. 
                    I especially enjoyed the café in the mornings—it had great coffee and a peaceful vibe. The restaurant 
                    food was also really good."</p>
                  
                  <!-- Orange Rectangle -->
                  <div class="rating-orangeRec"></div>
                </div>
              </div>
            </div>
        
            <!-- Second Card -->
            <div class="col" >
              <div class="card h-100 position-relative" style="background-color: rgba(246, 228, 193, 0.42)">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-2">
                    <img src="../images/prof_angel.png" class="rating-prof" alt="Profile Picture">
                    <h6 class="card-title mb-0">Angel Palle</h6>
                  </div>
                  <img src="../images/rating_1.png " class="rating-star" alt="Rating">
                  <p class="card-text rating-review"> 
                    "Great little hotel in a convenient location. The service was excellent, and everything felt welcoming 
                    and relaxed. I liked being able to grab a snack or coffee at the café during the day. Dinner at the 
                    restaurant was a nice and the food is very tasty!"</p>
                  
                  <!-- Orange Rectangle -->
                  <div class="rating-orangeRec"></div>
                </div>
              </div>
            </div>
        
            <!-- Third Card -->
            <div class="col">
              <div class="card h-100 position-relative">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-2">
                    <img src="../images/prof_jemaica.png"class=" rating-prof" alt="Profile Picture">
                    <h6 class="card-title mb-0">Jemaica Silvano</h6>
                  </div>
                  <img src="../images/rating_1.png"class=" rating-star" alt="Rating">
                  <p class="card-text rating-review"> "Perfect for a weekend getaway. The rooms were simple but comfortable, and everything I needed was 
                    right there. The café had a nice atmosphere, and I enjoyed sitting outside. The restaurant had good 
                    options and fair prices. I will love to stay here again."</p>
                  
                  <!-- Orange Rectangle -->
                  <div class="rating-orangeRec"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <!-- End Review -->

      
    </main>
    <footer>
       <!-- div is for the background color below '#ffa800' -->
      <div></div> 
      <img src="../images/cpany_logo.png" alt="Company Logo">
    </footer>
</body>
</html>