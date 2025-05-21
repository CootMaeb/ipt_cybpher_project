<?php
 session_start();

 require '../includes/db.php';

 try {
    $stmt = $pdo->prepare("
    SELECT 
        booking.bookingID,
        customer.fullName,
        booking.check_in_Date,
        booking.check_out_Date,
        room.roomType,
        room.amount
    FROM booking
    JOIN customer ON booking.customerID = customer.customerID
    JOIN room ON booking.roomID = room.roomID
    ORDER BY booking.check_in_Date DESC
    ");
    $stmt->execute();
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $bookings = [];
    error_log("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F-Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar" style="background-color: #ffa800;">
            <div class="logo">
                <img src="../images/Lexsuz_logo.jpg"  class="d-inline-block align-top" alt="" style="height: 90px; width: 90px; border-radius: 100px;">
            </div>
            <div class="nav-menu pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active-edit" href="#">
                            <img class="image-padding" src="../images/staff_db_icon_light.png">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./frontdesk_bookings.php">
                            <img class="image-padding" src="../images/staff_bookings_icon_dark.png">
                            Bookings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sample_print.php" target="_blank">
                            <img class="image-padding mr-2" src="../images/staff_rooms_icon_dark.png" alt="Report Icon">
                            <span>Print Booking Report</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
    </div>
    </section>
    <!-- Sidebar End -->

    <!-- Topbar and main content -->
    <section style="margin-left: 1.5rem;">
        <div class="top-and-main">
            <!--Top Navbar -->
            <nav class="navbar navbar-light bg-white" style="height: 5rem;">
                <div class="container-fluid">
                    <div class="d-flex flex-column">
                        <h5 class="fw-bold mb-0" style="font-size: x-large;">July 9, 2025</h5>
                        <span class="d-flex">
                            <small><span class="fw-bold" style="color: #ffa800; font-size: medium;">Howdy, Mael! </span><span style="color: #424242;">Ready for the day?</span></small>
                        </span>
                    </div>
                    
                    <div class="d-flex align-items-center" style="margin-right:21px;">
                        <!-- User icon -->
                        <a class="navbar-brand" href="#">
                            <img src="../images/staff_profile_uihuman.png" style="height: 45px; width: 45px;" alt="User profile">
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Main Content-->
            <main class=>
                <!--First Presentation -->
                <section class="container py-4">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <!-- First Card -->
                        <div class="col" style=" width: 19.5rem;">
                            <div class="card position-relative" style="background-color:#FFF0DA">
                            <div class="card-body">
                                <div class="d-flex align-items-center" style="margin-bottom: 20px; ">
                                <h6 class="card-title mb-0" style="font-size: large;">New Bookings</h6>
                                </div>
                                <small><p style="color: grey; margin-top: -10px;">Since last week</p></small>
                            <h2 class="fw-bold">200</h2>
                            </div>
                            </div>
                        </div>
                    
                        <!-- Second Card -->
                        <div class="col" style=" width: 19.5rem;">
                            <div class="card position-relative" style="background-color:#FFC46C;">
                            <div class="card-body">
                                <div class="d-flex align-items-center" style="margin-bottom: 20px; ">
                                <h6 class="card-title mb-0" style="font-size: large;">New Customers</h6>
                                </div>
                                <small><p style="color: gray; margin-top: -10px;">Since last month</p></small>
                            <h2 class="fw-bold">200</h2>
                            </div>
                            </div>
                        </div>
                    
                        <!-- Third Card -->
                        <div class="col" style=" width: 19.5rem;">
                            <div class="card position-relative" style="background-color:#A46D14;">
                            <div class="card-body">
                                <div class="d-flex align-items-center" style="margin-bottom: 20px; ">
                                <h6 class="card-title mb-0" style="font-size: large; color: white;">Upcoming Check-outs</h6>
                                </div>
                                <small><p style="color: lightgray; margin-top: -10px;">Within this week</p></small>
                            <h2 class="fw-bold" style="color: white;">200</h2>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="text-center" style="margin-top:4.5rem;margin-bottom: 4rem;">
                        <p class="display-8" style="font-weight: 700;color:#424242; font-size: 1.2rem">+++++++Booking Records+++++++</p>
                    </div>
            
                    <!-- Second Column: User Table -->
                    <div class="col-md-9" style="width:58rem; ">
                        <div style="" id="liveAlert"></div>
                            <div class="card" style="width:100%;min-height: 30rem;">
                                <div class="card-body">
                                    <input type="text" style="width: 100%; margin-top: 20px; margin-bottom: 20px;" class="form-control" id="search" placeholder="Search ..." aria-label="Search" aria-describedby="basic-addon2">
                                    <table id="userTable" class="table table-stripped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Booking ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Check-in</th>
                                                <th scope="col">Check-out</th>
                                                <th scope="col">Room Type</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userTableBody" style="font-size: 13px;">
                                        <?php foreach ($bookings as $booking): ?>
                                        <tr>
                                                <td><?= htmlspecialchars($booking['bookingID']) ?></td>
                                                <td><?= htmlspecialchars($booking['fullName']) ?></td>
                                                <td><?= htmlspecialchars(date('M j, Y', strtotime($booking['check_in_Date']))) ?></td>
                                                <td><?= htmlspecialchars(date('M j, Y', strtotime($booking['check_out_Date']))) ?></td>
                                                <td><?= htmlspecialchars($booking['roomType']) ?></td>
                                                <td>₱<?= htmlspecialchars(number_format($booking['amount'], 2)) ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                </section>
                
            </main>
        </div>
    </section>
               
    
        <script>
            function addUser() {
                let customerID = $("#customerID").val();
                let check_in_Date = $("#check_in_Date").val();
                let check_out_Date = $("#check_out_Date").val();
                let roomID = $("#roomID").val();
                let amount = $("#amount").val();

                $("customerID").val("");
                $("check_in_Date").val("");
                $("check_out_Date").val("");
                $("roomID").val("");
                $("amount").val("");
          
            }
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('search');
                const userTableBody = document.getElementById('userTableBody');
                const rows = userTableBody.getElementsByTagName('tr');
                
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    
                    for (let i = 0; i < rows.length; i++) {
                        const row = rows[i];
                        const cells = row.getElementsByTagName('td');
                        let found = false;
                        
                        // Check each cell in the row (except the last one if needed)
                        for (let j = 0; j < cells.length; j++) {
                            const cellText = cells[j].textContent.toLowerCase();
                            if (cellText.includes(searchTerm)) {
                                found = true;
                                break;
                            }
                        }
                    
                        // Show or hide the row based on search match
                        row.style.display = found ? '' : 'none';
                    }
                });
            });
          
        </script>

    <footer style="height: 60px; position: relative; display: flex; align-items: flex-end;">
        <div style=" width: 100%; height: 30px; position: absolute; background-color: #ffa800; z-index: 1; bottom: 0; "></div> 
        <img src="../images/cpany_logo.png" style=" position: absolute; z-index: 2; top: 50%; left: 50%;margin-top: -20px; 
            margin-left: 100px; height: 50px; width: 50px;" alt="Company Logo">
      </footer>
</body>
</html>