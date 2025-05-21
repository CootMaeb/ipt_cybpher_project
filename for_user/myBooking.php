
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./style.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top user-navbar">
    <div class="container-fluid">
        <div class="navbar_titleForBooking">
            <a class="navbar-brand" href="user_index.php">
                <span>Lexsuz</span><span> Hotel</span>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="./user_index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="./user_room.php">Room</a></li>
                <li class="nav-item"><a class="nav-link" href="./user_index.php#about_us-section">About Us</a></li>
            </ul>
            <div class="d-flex align-items-center">
                <p><a href="./myBooking.php" class="me-3 d-md-inline bookingLink">My Booking |</a></p>
                <a href="#">
                    <img src="../images/prof_uiman.png " class="user-profile" alt="Profile Picture">
                </a>
            </div>
        </div>
    </div>
</nav>

<main style="position: relative; min-height: 555px;">
    <div class="container">
        <section class="py-4">
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center mb-4">
                <form class="d-flex me-2 mb-3 mb-md-0" role="search" style="width: 25rem;">
                    <input class="form-control me-2" type="search" id="search-input" placeholder="Search bookings..." aria-label="Search" style="border:2px solid #ffa800;">
                    <button class="btn" type="button" id="search-btn" style="background-color: #ffa800; color:white">Search</button>
                </form>
        
                <div class="ms-md-auto d-flex flex-wrap justify-content-center">
                    <button type="button" class="btn filter-btn" data-status="confirmed" style="color:green; border-color:green;">Confirmed</button>
                    <button type="button" class="btn filter-btn" data-status="pending" style="color:purple; border-color:purple;">Pending</button>
                    <button type="button" class="btn filter-btn" data-status="canceled" style="color:red; border-color:red;">Cancelled</button>
                </div>
            </div>

            <div id="bookings-container">
                <!-- for Confirmed Bookings -->
                <div class="card booking-card mb-3 edit-cardForBooking" data-status="confirmed" data-search="standard room a confirmed">
                    <div class="card-body">
                        <div class="row" style="height: 12rem;">
                            <div class="col-md-3" >
                                <img src="../images/A03_standard_a.jpg" class="img-fluid rounded edit-imageforBooking" alt="standard room a">
                            </div>
                            <div class="col-md-5">
                                <h5 class="card-title">Standard Room A</h5>
                                <p class="text-muted">Php 1,000</p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span style="color:green;font-size:bold;">Confirmed</span>
                                <p class="mt-2">Stay: 3 nights</p>
                                <p class="mt-2">Total Amount: 3,000</p>
                                <p class="btn btn-sm btn-outline-danger edit-cardBtn" style=" border-left:10px solid red;">
                                    Cancel</p>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="card booking-card mb-3 edit-cardForBooking" data-status="confirmed" data-search="standard room b confirmed">
                    <div class="card-body">
                        <div class="row" style="height: 12rem;">
                            <div class="col-md-3" >
                                <img src="../images/A04_standard_b.jpg" class="img-fluid rounded edit-imageforBooking" alt="standard room b">
                            </div>
                            <div class="col-md-5">
                                <h5 class="card-title">Standard Room B</h5>
                                <p class="text-muted">Php 1,200</p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span style="color:green;font-size:bold;">Confirmed</span>
                                <p class="mt-2">Stay: 3 nights</p>
                                <p class="mt-2">Total Amount: 3,600</p>
                                <p class="btn btn-sm btn-outline-danger edit-cardBtn" style="border-left:10px solid red;">
                                    Cancel</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- for Pending Bookings -->
                <div class="card booking-card mb-3 pending-card edit-cardForBooking" data-status="pending" data-search="classic queen pending">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="../images/A01_classic_queen.jpg" class="img-fluid rounded edit-imageforBooking" alt="classic queen">
                            </div>
                            <div class="col-md-5">
                                <h5 class="card-title">Classic Queen</h5>
                                <p class="text-muted">Php 1,500</p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span style="color:purple;font-size:bold;">Pending</span>
                                <p class="mt-2">Stay: 3 nights</p>
                                <p class="mt-2">Total Amount: 4,500</p>
                                <p class="btn btn-sm btn-outline-success edit-cardBtn" style="border-left:10px solid green;">
                                    Confirmed</p>
                                <p class="btn btn-sm btn-outline-danger edit-cardBtn" style="border-left:10px solid red; margin-left:1.5rem;">
                                    Cancel</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--for Cancelled  Bookings-->
                 <div class="card booking-card mb-3 pending-card edit-cardForBooking" data-status="canceled" data-search="superior twin canceled">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="../images/A02_superior_twin.jpg" class="img-fluid rounded edit-imageforBooking" alt="superior twin">
                            </div>
                            <div class="col-md-5">
                                <h5 class="card-title">Superior Twin</h5>
                                <p class="text-muted">Php 1,500</p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span style="color:red;font-size:bold;">Canceled</span>
                                <p class="mt-2">Stay: 3 nights</p>
                                <p class="mt-2">Total Amount: 4,500</p>
                                <p class="btn btn-sm edit-cardBtn" style="background-color:#ffa800; color:black; font-weight:bold;">
                                    Book Again</p>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </div>
</main>

<footer>
     <!-- div is for the background color below '#ffa800' -->
      <div></div> 
      <img src="../images/cpany_logo.png" alt="Company Logo">
</footer>


<script>
    // Filter bookings by status
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const status = this.dataset.status;

            document.querySelectorAll('.booking-card').forEach(card => {
                const cardStatus = card.dataset.status;
                if (status === 'all' || cardStatus === status) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Search functionality
    document.getElementById('search-btn').addEventListener('click', searchBookings);
    document.getElementById('search-input').addEventListener('keyup', function(e) {
        if (e.key === 'Enter') searchBookings();
    });

    function searchBookings() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();

        document.querySelectorAll('.booking-card').forEach(card => {
            const title = card.querySelector('.card-title')?.textContent.toLowerCase() || '';
            if (title.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
</body>
</html>