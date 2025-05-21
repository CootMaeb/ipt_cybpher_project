<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
  <nav class="container py-4 navbar navbar-expand-lg sticky-top" style="background-color: white; ">
    <div class="container-fluid " >
      <!-- Brand/Logo Section -->
      <div style="font-family: 'Poppins'; font-weight: 900; font-size: larger;">
      <a class="navbar-brand" href="#">
          <span style="color: #ffa800;">Lexsu</span><span style="color: #424242;">z Hotel</span>
      </a>
      </div>
      
      <!-- Navbar Toggler (for mobile) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Main Navigation -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#room-section">Room</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about_us-section">About Us</a>
          </li>
        </ul>
        
        <!-- Right-aligned items -->
        <ul class="navbar-nav ms-auto" style="position: absolute; right: 20px;">
          <li class="nav-item">
            <a href="./login.php" class="btn" style="background-color: #ffa800; color: white; font-weight: bold;">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
      
    <main>
      <!-- Upper Presentation -->
      <section class="container py-4" style=" position: relative; height:555px;">
        <div class="container-ndex" style="position: relative; height: 100%;">
          
          <!-- Text Container -->
          <div class="text-center w-100" style="
            position: absolute;
            transform: translateY(-50%);
            top:10%;
            z-index: 1;">
            <h3 class="text-muted" style="font-size: 1.2rem">Unforgettable warm stay at</h3>
            <h1 class=" fw-bold" style="font-size: 5.6rem; text-shadow: 
            2px 2px 0px #3a2c1a, 
            -1px -1px 0px #1a1a1a;">Lexsuz Hotel</h1>
          </div>
      
          <!-- Image Container -->
          <div class="row w-100 m-0" style="
          
            position: absolute;
            z-index: 2;
            height: 78%;
            top:18%;
            box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <div class="col-12 h-100 p-0" style="
              display: flex;
              justify-content: center;
              overflow: hidden;
            ">
              <img src="./images/index_samplemain.png" 
                   class="rounded shadow" 
                   style="
                     object-fit: cover;
                     height: 100%;
                     width: 100%;
                     max-width: 100%;
                     opacity: 95%;
                   " 
                   alt="Lexsuz Hotel">
            </div>
          </div>
          
          <!-- Fake Navigation -->
          <div class="position-absolute w-100" style="
            bottom: -1%;
            z-index: 3;
            display: flex;
            justify-content: center;
          ">
            <nav class="d-flex justify-content-between align-items-center bg-white rounded shadow-sm" style="
              padding: 5px;
              width: 85%;
              
              background-color: #f5ebda;
            ">
              <div class="d-flex align-items-center">
                <img src="./images/icon_location.png" style="margin-left:3px; width: 20px; height: 20px;" class="me-2" alt="Location icon">
                <p class="mb-0 small text-center">Capitol Grounds, Malaybalay City, <br>Philippines</p>
              </div>
              
              <div class="d-flex align-items-center">
                <p class="mb-0 me-2 small text-center">Come find us! <br>We are always open!</p>
                <img src="./images/icon_search.png" style="margin-right:3px; width: 20px; height: 20px;" alt="Search icon">
              </div>
            </nav>
          </div>
      
          <!-- Book now button -->
          <div class="position-absolute d-grid gap-2 mx-auto mb-3"
            style="
              z-index: 4;
              width: 40%;
              height: 9%;
              left: 50%;
              bottom: 2%;
              transform: translateX(-50%);
            ">
            <button type="button" class="btn bnt"
              style="font-size: 1.5rem; font-weight: bold; background: linear-gradient(to right, 
              #ff9100 0%,    
              #e88500 50%,   
              #fce2c4 100%   
            );">Book Now</button>
          </div>
        </div>
      </section>
      <!-- End of the Presentation -->

      <!-- Start Room Section -->
      <section id="room-section" class="container py-4"style="position: relative; margin-top: 20px;">
        <div class="text-center"style="margin-bottom: 4rem;">
          <p class="display-8" style="font-weight: 700;color:#424242; font-size: 1.2rem">+++++++Room+++++++</p>
        </div>
        
        <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 2rem;">
          <!-- Card 1 -->
          <div class="card" style="width: 17rem; margin-bottom: 1rem; border: 1px solid #f6d593;box-shadow: -5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <img src="./images/A03_standard_a.jpg" class="card-img-top" alt="Standard Room" 
                 style="object-fit: cover; height:15rem; padding: 8px; border-top-left-radius:15px; border-top-right-radius:15px;">
            <h6 style="margin-left: 20px; margin-top: 0.5rem; color:#424242;">Standard Room</h6>
            <div class="card-body">
              <h3 class="card-text text-center"style="color:#424242;">₱1,000<small style="font-size: small;">/night</small></h3>
            </div>
          </div>
          
          <!-- Card 2 -->
          <div class="card" style="width: 17rem; margin-bottom: 1rem; border: 1px solid #f6d593;box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <img src="./images/A01_classic_queen.jpg" class="card-img-top" alt="Standard Room" 
                 style="object-fit: cover; height:15rem; padding: 8px; border-top-left-radius:15px; border-top-right-radius:15px;">
            <h6 style="margin-left: 20px; margin-top: 0.5rem;color:#424242;">Classic Queen</h6>
            <div class="card-body">
              <h3 class="card-text text-center"style="color:#424242;">₱1,500<small style="font-size: small;">/night</small></h3>
            </div>
          </div>
          
          <!-- Card 3 -->
          <div class="card" style="width: 17rem; margin-bottom: 1rem; border: 1px solid #f6d593;box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <img src="./images/A02_superior_twin.jpg" class="card-img-top" alt="Standard Room" 
                 style="object-fit: cover; height:15rem; padding: 8px; border-top-left-radius:15px; border-top-right-radius:15px;">
            <h6 style="margin-left: 20px; margin-top: 0.5rem;color:#424242;">Superior Twin</h6>
            <div class="card-body">
              <h3 class="card-text text-center"style="color:#424242;">₱1,500<small style="font-size: small;">/night</small></h3>
            </div>
          </div>
        </div>
      </section>
      <!-- End Room Section -->

      <!-- Start About Us -->
      <section id="about_us-section" class="container py-4" style="position: relative; margin-top: 20px;">
        <div class="text-center" style="margin-bottom: 4rem;">
          <p class="display-8" style="font-weight: 700;color:#424242; font-size: 1.2rem">+++++++About Us+++++++</p>
        </div>
      
        <!-- About Lexsus Hotel -->
        <div style="display: flex; align-items: center; gap: 2rem;">
          <!-- Image on the left -->
          <div style=" border-radius: 8px; box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <img 
              src="./images/Lexsuz_logo.jpg" 
              alt="Lexsuz Hotel" 
              style="
                margin:13px;
                width: 30rem;
                height:20rem;
                object-fit: cover;
                border-radius: 8px;
              "
            >
          </div>
          
          <!-- Text content on the right -->
          <div>
            <h4 class=" fw-bold" style="margin-bottom: 4rem;">
              <span style="color: #ffa800; font-size: larger;">Lexsu</span><span style="color: #424242; font-size: larger;">z Hotel</span>
            </h4>
            <p style="color: #555; line-height: 1.6; font-size: 1rem;">
              Welcome to Lexsus Hotel, a charming and cozy escape located near the Capitol Grounds in 
              Malaybalay City. Our small hotel offers a warm, welcoming atmosphere perfect for both business
               and leisure travelers seeking comfort and convenience in the heart of Bukidnon.
            </p>
           
          </div>
        </div>
      
        <!-- Why choose Lexsuz Hotel? -->
        <div style="display: flex; align-items: center; gap: 2rem;margin-top:30px;">
          <!-- Text content on the left -->
          <div style="flex:1; order: 1; ">
            <h4 class=" fw-bold" style="margin-bottom: 4rem;">
              <span style="color: #424242;font-size: larger;">Why choose us?</span>
            </h4>
            <p style="color: #555; line-height: 1.6; font-size: 1rem;">
              Just a short walk from parks, and local attractions, our location makes it easy to explore the best
               of Malaybalay. Guests can enjoy clean, well-appointed rooms, personalized service, and a relaxing environment
                designed for rest and rejuvenation. Whether you're staying for a night or an extended visit, Lexsus Hotel is your 
                ideal starting point in the city.
            </p>
          </div>
      
          <!-- Image on the right -->
          <div style="flex: 0; order: 2; border-radius: 8px; box-shadow: 5px 5px 5px 5px rgba(250, 167, 2, 0.151);">
            <img 
              src="./images/A05_hotel.jpg" 
              alt="Lexsuz Hotel" 
              style="
                margin:13px;
                width: 30rem;
                height:20rem;
                object-fit: cover;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
              "
            >
          </div>
        </div>
      </section>
      <!-- End About Us -->

      <!-- Start Cafe and Restaurant -->
      <section class="container py-4" style="position: relative; margin-top: 20px;">
        <div class="text-center" style="margin-bottom: 4rem;">
          <p class="display-8" style="font-weight: 700; color: #424242; font-size: 1.2rem">+++++++Cafe and Restaurant+++++++</p>
        </div>
      
        <!-- Card of the Cafe and Restaurant -->
        <div class="card mb-3" style="width:100%; height: 350px; box-shadow: -5px 5px 5px 5px rgba(250, 167, 2, 0.151); background-color: rgba(246, 228, 193, 0.42)">
          <div class="row g-0 ">
            <div class="col-md-4">
              <img src="./images/A06_cafeNresto.jpg" class="img-fluid rounded-start" alt="Hotel Room" style="object-fit: cover;width:350px; height: 350px;">
            </div>
            <div class="col-md-8">
              <div class="card-body h-100" style="padding: 2rem;">
                <h5 class="card-title" style="font-size: 1.5rem; margin-bottom: 2rem;">
                  <span style="color: #424242;">Cafe and Rest</span><span style="color: #ffa800;">aurant</span>
                </h5>
                <p style="color: #555; line-height: 1.6; font-size: 1rem; margin-bottom: 1rem;">
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
      <section class="container py-4" style="position: relative; margin-top: 20px;">
        <div class="text-center" style="margin-bottom: 4rem;">
          <p class="display-8" style="font-weight: 700;color:#424242; font-size: 1.2rem">+++++++Review+++++++</p>
        </div>
        <section class="container py-4">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- First Card -->
            <div class="col">
              <div class="card h-100 position-relative">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-2">
                    <img src="./images/prof_maev.png" style="height: 40px; width: 40px;" alt="Profile Picture">
                    <h6 class="card-title mb-0">Maevyel Coot</h6>
                  </div>
                  <img src="./images/rating_1.png" style="height: 15px; width:auto; margin-left:3rem;" alt="Rating">
                  <p class="card-text " style="margin-top:3rem; margin-bottom: 5rem;"> 
                    "I had a lovely stay at this hotel! The room was clean and cozy, and the staff were very friendly. 
                    I especially enjoyed the café in the mornings—it had great coffee and a peaceful vibe. The restaurant 
                    food was also really good."</p>
                  
                  <!-- Orange Rectangle -->
                  <div style="
                    position: absolute;
                    right: 0px;
                    width: 60px;
                    height: 110px;
                    bottom:0;
                    background-color: #ffa800;
                    border-bottom-right-radius: 5px;
                    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                    z-index: 1;
                  "></div>
                </div>
              </div>
            </div>
        
            <!-- Second Card -->
            <div class="col" >
              <div class="card h-100 position-relative" style="background-color: rgba(246, 228, 193, 0.42)">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-2">
                    <img src="./images/prof_angel.png" style="height: 40px; width: 40px;" alt="Profile Picture">
                    <h6 class="card-title mb-0">Angel Palle</h6>
                  </div>
                  <img src="./images/rating_1.png" style="height: 15px; width:auto; margin-left:3rem;" alt="Rating">
                  <p class="card-text " style="margin-top:3rem; margin-bottom: 5rem;"> 
                    "Great little hotel in a convenient location. The service was excellent, and everything felt welcoming 
                    and relaxed. I liked being able to grab a snack or coffee at the café during the day. Dinner at the 
                    restaurant was a nice and the food is very tasty!"</p>
                  
                  <!-- Orange Rectangle -->
                  <div style="
                    position: absolute;
                    right: 0px;
                    width: 60px;
                    height: 110px;
                    bottom:0;
                    background-color: #ffa800;
                    border-bottom-right-radius: 5px;
                    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                    z-index: 1;
                  "></div>
                </div>
              </div>
            </div>
        
            <!-- Third Card -->
            <div class="col">
              <div class="card h-100 position-relative">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-2">
                    <img src="./images/prof_jemaica.png" style="height: 40px; width: 40px;" alt="Profile Picture">
                    <h6 class="card-title mb-0">Jemaica Silvano</h6>
                  </div>
                  <img src="./images/rating_1.png" style="height: 15px; width:auto; margin-left:3rem;" alt="Rating">
                  <p class="card-text " style="margin-top:3rem; margin-bottom: 5rem;"> 
                    "Perfect for a weekend getaway. The rooms were simple but comfortable, and everything I needed was 
                    right there. The café had a nice atmosphere, and I enjoyed sitting outside. The restaurant had good 
                    options and fair prices. I will love to stay here again."</p>
                  
                  <!-- Orange Rectangle -->
                  <div style="
                    position: absolute;
                    right: 0px;
                    width: 60px;
                    height: 110px;
                    bottom:0;
                    background-color: #ffa800;
                    border-bottom-right-radius: 5px;
                    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                    z-index: 1;
                  "></div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <!-- End Review -->

      
    </main>
    <footer style="height: 60px; position: relative; display: flex; align-items: flex-end;">
      <div style=" width: 100%; height: 30px; position: absolute; background-color: #ffa800; z-index: 1; bottom: 0; "></div> 
      <img src="./images/cpany_logo.png" style=" position: absolute; z-index: 2; top: 50%; left: 50%;margin-top: -20px; 
        margin-left: -50px; height: 50px; width: 50px;" alt="Company Logo">
    </footer>
</body>
</html>