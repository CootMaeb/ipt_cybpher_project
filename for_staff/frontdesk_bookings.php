<?php
session_start();
require '../includes/db.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_customer'])) {
        // Add customer logic
        try {
            $stmt = $pdo->prepare("INSERT INTO customer (fullname, phoneNumber, emailAddress) 
                       VALUES (?, ?, ?)");
            $stmt->execute([
                $_POST['fullname'],
                $_POST['phoneNumber'],
                $_POST['emailAddress']
            ]);
            $_SESSION['message'] = "Customer added successfully";
            $_SESSION['show_booking_modal'] = true;
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } catch (PDOException $e) {
            $error = "Error adding customer: " . $e->getMessage();
        }
    } 
    elseif (isset($_POST['add_booking'])) {
        try {
            $stmt = $pdo->prepare("INSERT INTO booking (customerID, check_in_Date, check_out_Date, time_in, time_out, roomID, bookingStatus, confirmedBy, bookingType) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'walk-in')");
            $stmt->execute([
                $_POST['customerID'],
                $_POST['check_in_Date'],
                $_POST['check_out_Date'],
                $_POST['time_in'],
                $_POST['time_out'],
                $_POST['roomID'],
                $_POST['bookingStatus'],
                $_POST['confirmedBy']
            ]);
            $_SESSION['message'] = "Walk-in booking added successfully";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } catch (PDOException $e) {
            $error = "Error adding booking: " . $e->getMessage();
        }
    }
    elseif (isset($_POST['update_booking'])) {
        try {
            $stmt = $pdo->prepare("UPDATE booking SET 
                                  customerID = ?, 
                                  check_in_Date = ?, 
                                  check_out_Date = ?, 
                                  time_in = ?, 
                                  time_out = ?, 
                                  roomID = ?, 
                                  bookingStatus = ?, 
                                  confirmedBy = ?,
                                  update_date = CURDATE(),
                                  update_time = CURTIME()
                                  WHERE bookingID = ?");
            $stmt->execute([
                $_POST['customerID'],
                $_POST['check_in_Date'],
                $_POST['check_out_Date'],
                $_POST['time_in'],
                $_POST['time_out'],
                $_POST['roomID'],
                $_POST['bookingStatus'],
                $_POST['confirmedBy'],
                $_POST['bookingID']
            ]);
            $_SESSION['message'] = "Booking updated successfully";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } catch (PDOException $e) {
            $error = "Error updating booking: " . $e->getMessage();
        }
    }
    elseif (isset($_POST['delete_booking'])) {
        try {
            $stmt = $pdo->prepare("DELETE FROM booking WHERE bookingID = ?");
            $stmt->execute([$_POST['bookingID']]);
            $_SESSION['message'] = "Booking deleted successfully";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } catch (PDOException $e) {
            $error = "Error deleting booking: " . $e->getMessage();
        }
    }
}

// Fetch bookings data
// Fetch bookings data
try {
    $stmt = $pdo->prepare("
    SELECT 
    booking.bookingID,
    booking.customerID,
    customer.fullName,
    booking.check_in_Date,
    booking.check_out_Date,
    booking.time_in,
    booking.time_out,
    room.roomID,
    room.roomType,
    room.amount,
    booking.update_date,
    booking.update_time,
    booking.bookingStatus,
    booking.confirmedBy,
    staff.staffName AS confirmedByName,
    booking.bookingType
FROM booking
LEFT JOIN staff ON booking.confirmedBy = staff.staffID
LEFT JOIN customer ON booking.customerID = customer.customerID
LEFT JOIN room ON booking.roomID = room.roomID
ORDER BY booking.check_in_Date DESC
    ");
    $stmt->execute();
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $bookings = [];
    $error = "Database error: " . $e->getMessage();
}
// Fetch customers for dropdown
$customers = $pdo->query("SELECT customerID, fullName FROM customer")->fetchAll(PDO::FETCH_ASSOC);

// Fetch rooms for dropdown
$rooms = $pdo->query("SELECT roomID, roomType, amount FROM room")->fetchAll(PDO::FETCH_ASSOC);

// Fetch staff for dropdown
$staff = $pdo->query("SELECT staffID, staffName FROM staff")->fetchAll(PDO::FETCH_ASSOC);

// Booking status options
$statusOptions = ['pending', 'confirmed', 'cancelled'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F-Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar" style="background-color: #ffa800;">
            <div class="logo">
                <img src="../images/Lexsuz_logo.jpg" class="d-inline-block align-top edit-logoImage">
            </div>
            <div class="nav-menu pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="./frontdesk_index.php">
                            <img class="image-padding" src="../images/staff_db_icon_dark.png">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active-edit" href="#">
                            <img class="image-padding" src="../images/staff_bookings_icon_light.png">
                            Bookings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sample_print.php" target="_blank">
                            <img class="image-padding mr-2" src="../images/staff_rooms_icon_dark.png" alt="Report Icon">
                            <span>Print Booking Report</span>
                        </a>
                    </li>
            </div>
        </div>

        <!-- Topbar and main content -->
        <div class="top-and-main">
            <!-- Top Navbar -->
            <nav class="navbar navbar-light bg-white" style="height: 5rem;">
                <div class="container-fluid">
                    <form class="d-flex me-2" role="search" style="width: 20rem; ">
                        <input type="text" class="form-control me-2" id="search" placeholder="Search" style="border:2px solid  #ffa800;">
                        <button class="btn edit-bookingSearch" type="submit">Search</button>
                    </form>
                    
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-primary" id="addBookingBtn" style="margin-right:20px; background-color:#ffa800;border:#ffa800;">Add Booking</button>
                        <a class="navbar-brand" href="#">
                            <img src="../images/staff_profile_uihuman.png" class="f-user-profile" alt="User profile">
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Add Customer Modal -->
            <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background:#ffa800;">
                            <h5 class="modal-title" id="customerModalLabel" style="color:white; font-weight:bold; ">Add New Customer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addCustomerForm" method="POST">
                                <div class="mb-2">
                                    <label for="fullname" class="form-label small mb-1">Name</label>
                                    <input name="fullname" type="text" class="form-input form-control py-2 px-2" id="fullname" placeholder="Type your full name here" required>
                                </div>
                                <div class="mb-2">
                                    <label for="phoneNumber" class="form-label small mb-1">Phone Number</label>
                                    <input name="phoneNumber" type="tel" class="form-input form-control py-2 px-2" id="phoneNumber" placeholder="Your contact number here" required>
                                </div>
                                <div class="mb-2">
                                    <label for="emailAddress" class="form-label small mb-1">Email Address</label>
                                    <input name="emailAddress" type="email" class="form-input form-control py-2 px-2" id="emailAddress" placeholder="Let's keep in touch — your email?" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="add_customer" class="btn btn-primary" style="background:#ffa800; border:#ffa800;">Add Customer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Booking Modal -->
            <div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#ffa800;">
                <h1 class="modal-title fs-5" id="addBookingModalLabel" style="color:white; font-weight:bold; ">Add New Walk-in Booking</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addBookingForm" method="POST">
                    <!-- Hidden input field for booking type -->
                    <input type="hidden" name="bookingType" value="walk-in">
                    
                    <div class="mb-3">
                        <label for="add_customerID" class="form-label">Customer</label>
                        <div class="d-flex">
                            <select class="form-select" id="add_customerID" name="customerID" required>
                                <option value="">Select Customer</option>
                                <?php foreach ($customers as $customer): ?>
                                    <option value="<?= htmlspecialchars($customer['customerID']) ?>">
                                        <?= htmlspecialchars($customer['fullName']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="button" class="btn ms-2" id="newCustomerBtn" style="background:#ffa800; border:#ffa800; color:white;">New</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="add_bookingStatus" class="form-label">Status</label>
                        <select class="form-select" id="add_bookingStatus" name="bookingStatus" required>
                            <?php foreach ($statusOptions as $status): ?>
                                <option value="<?= htmlspecialchars($status) ?>"><?= htmlspecialchars($status) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="add_check_in_Date" class="form-label">Check-in Date</label>
                            <input type="date" class="form-control" id="add_check_in_Date" name="check_in_Date" required>
                        </div>
                        <div class="col">
                            <label for="add_time_in" class="form-label">Time-in</label>
                            <input type="time" class="form-control" id="add_time_in" name="time_in" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="add_check_out_Date" class="form-label">Check-out Date</label>
                            <input type="date" class="form-control" id="add_check_out_Date" name="check_out_Date" required>
                        </div>
                        <div class="col">
                            <label for="add_time_out" class="form-label">Time-out</label>
                            <input type="time" class="form-control" id="add_time_out" name="time_out" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="add_roomID" class="form-label">Room Type</label>
                        <select class="form-select" id="add_roomID" name="roomID" required>
                            <option value="">Select Room Type</option>
                            <?php foreach ($rooms as $room): ?>
                                <option value="<?= htmlspecialchars($room['roomID']) ?>">
                                    <?= htmlspecialchars($room['roomType']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="add_confirmedBy" class="form-label">Confirmed By</label>
                        <select class="form-select" id="add_confirmedBy" name="confirmedBy" required>
                            <option value="">Select Staff</option>
                            <?php foreach ($staff as $staffMember): ?>
                                <option value="<?= htmlspecialchars($staffMember['staffID']) ?>">
                                    <?= htmlspecialchars($staffMember['staffName']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_booking" class="btn btn-primary" style="background:#ffa800; border:#ffa800;">Add Walk-in Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

            <!-- Edit Booking Modal -->
            <div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background:#ffa800;>
                            <h1 class="modal-title fs-5" id="editBookingModalLabel">Edit Booking</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editBookingForm" method="POST">
                                <input type="hidden" id="edit_bookingID" name="bookingID">
                                <div class="mb-3">
                                    <label for="edit_customerID" class="form-label">Customer</label>
                                    <select class="form-select" id="edit_customerID" name="customerID" required>
                                        <?php foreach ($customers as $customer): ?>
                                            <option value="<?= htmlspecialchars($customer['customerID']) ?>">
                                                <?= htmlspecialchars($customer['fullName']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_bookingStatus" class="form-label">Status</label>
                                    <select class="form-select" id="edit_bookingStatus" name="bookingStatus" required>
                                        <?php foreach ($statusOptions as $status): ?>
                                            <option value="<?= htmlspecialchars($status) ?>"><?= htmlspecialchars($status) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="edit_check_in_Date" class="form-label">Check-in Date</label>
                                        <input type="date" class="form-control" id="edit_check_in_Date" name="check_in_Date" required>
                                    </div>
                                    <div class="col">
                                        <label for="edit_time_in" class="form-label">Timein</label>
                                        <input type="time" class="form-control" id="edit_time_in" name="time_in" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="edit_check_out_Date" class="form-label">Check-out Date</label>
                                        <input type="date" class="form-control" id="edit_check_out_Date" name="check_out_Date" required>
                                    </div>
                                    <div class="col">
                                        <label for="edit_time_out" class="form-label">Time-out</label>
                                        <input type="time" class="form-control" id="edit_time_out" name="time_out" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_roomID" class="form-label">Room Type</label>
                                    <select class="form-select" id="edit_roomID" name="roomID" required>
                                        <?php foreach ($rooms as $room): ?>
                                            <option value="<?= htmlspecialchars($room['roomID']) ?>">
                                                <?= htmlspecialchars($room['roomType']) ?> 
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_confirmedBy" class="form-label">Confirmed By</label>
                                    <select class="form-select" id="edit_confirmedBy" name="confirmedBy" required>
                                        <?php foreach ($staff as $staffMember): ?>
                                            <option value="<?= htmlspecialchars($staffMember['staffID']) ?>">
                                                <?= htmlspecialchars($staffMember['staffName']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="update_booking" class="btn" style="background:#ffa800;">Update Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main class="container-fluid">
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table id="bookingTable" class="table table-striped">
                                        <thead style="font-size:14px">
                                            <tr>
                                                <th>Booking ID</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Type</th>
                                                <th>Check-in</th>
                                                <th>Check-out</th>
                                                <th>Time In</th>
                                                <th>Time Out</th>
                                                <th>Room Type</th>
                                                <th>Amount</th>
                                                <th>Confirmed By</th>
                                                <th>Update Date</th>
                                                <th>Update Time</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bookingTableBody" style="font-size: 13px;">
                                            <?php foreach ($bookings as $booking): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($booking['bookingID']) ?></td>
                                                <td><?= htmlspecialchars($booking['fullName']) ?></td>
                                                <td><?= htmlspecialchars($booking['bookingStatus']) ?></td>
                                                <td><span class="badge badge-walkin"><?= htmlspecialchars($booking['bookingType']) ?></span></td>
                                                <td><?= htmlspecialchars(date('M j, Y', strtotime($booking['check_in_Date']))) ?></td>
                                                <td><?= htmlspecialchars(date('M j, Y', strtotime($booking['check_out_Date']))) ?></td>
                                                <td><?= htmlspecialchars(date('h:i A', strtotime($booking['time_in']))) ?></td>
                                                <td><?= htmlspecialchars(date('h:i A', strtotime($booking['time_out']))) ?></td>
                                                <td><?= htmlspecialchars($booking['roomType']) ?></td>
                                                <td>₱<?= htmlspecialchars(number_format($booking['amount'], 2)) ?></td>
                                                <td><?= htmlspecialchars($booking['confirmedByName']) ?></td> 
                                                <td><?= $booking['update_date'] ? htmlspecialchars(date('M j, Y', strtotime($booking['update_date']))) : 'N/A' ?></td>
                                                <td><?= $booking['update_time'] ? htmlspecialchars(date('h:i A', strtotime($booking['update_time']))) : 'N/A' ?></td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm edit-btn" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#editBookingModal"
                                                            data-booking-id="<?= htmlspecialchars($booking['bookingID']) ?>"
                                                            data-customer-id="<?= htmlspecialchars($booking['customerID']) ?>"
                                                            data-booking-status="<?= htmlspecialchars($booking['bookingStatus']) ?>"
                                                            data-check-in-date="<?= htmlspecialchars($booking['check_in_Date']) ?>"
                                                            data-check-out-date="<?= htmlspecialchars($booking['check_out_Date']) ?>"
                                                            data-time-in="<?= htmlspecialchars($booking['time_in']) ?>"
                                                            data-time-out="<?= htmlspecialchars($booking['time_out']) ?>"
                                                            data-room-id="<?= htmlspecialchars($booking['roomID']) ?>"
                                                            data-confirmed-by="<?= htmlspecialchars($booking['confirmedBy']) ?>">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm delete-btn" data-booking-id="<?= htmlspecialchars($booking['bookingID']) ?>">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <footer>
      <!-- div is for the background color below '#ffa800' -->
      <div style=" "></div> 
      <img src="../images/cpany_logo.png" alt="Company Logo">
    </footer>

    <!-- JavaScript includes -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    $(document).ready(function() {
        // Show booking modal if flag is set (after adding customer)
        <?php if (isset($_SESSION['show_booking_modal']) && $_SESSION['show_booking_modal']): ?>
        <script>
            $(document).ready(function() {
                $('#addBookingModal').modal('show');
            });
        </script>
        <?php unset($_SESSION['show_booking_modal']); ?>
    <?php endif; ?>

        // Search functionality
        $("#search").on("keyup", function() {
            let value = $(this).val().toLowerCase();
            $("#bookingTableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Handle add booking button click
        $("#addBookingBtn").click(function() {
            // Check if there are any customers
            if ($("#add_customerID option").length <= 1) {
                // No customers, show customer form first
                $('#customerModal').modal('show');
            } else {
                // Customers exist, show booking modal
                $('#addBookingModal').modal('show');
            }
        });

        // Handle new customer button in booking form
        $("#newCustomerBtn").click(function() {
            $('#addBookingModal').modal('hide');
            $('#customerModal').modal('show');
        });

        // Handle edit button click to populate modal
        $(document).on("click", ".edit-btn", function() {
            const bookingId = $(this).data('booking-id');
            const customerId = $(this).data('customer-id');
            const bookingStatus = $(this).data('booking-status');
            const checkInDate = $(this).data('check-in-date');
            const checkOutDate = $(this).data('check-out-date');
            const timeIn = $(this).data('time-in');
            const timeOut = $(this).data('time-out');
            const roomId = $(this).data('room-id');
            const confirmedBy = $(this).data('confirmed-by');
            
            // Populate the edit form
            $("#edit_bookingID").val(bookingId);
            $("#edit_customerID").val(customerId);
            $("#edit_bookingStatus").val(bookingStatus);
            $("#edit_check_in_Date").val(checkInDate);
            $("#edit_check_out_Date").val(checkOutDate);
            $("#edit_time_in").val(timeIn);
            $("#edit_time_out").val(timeOut);
            $("#edit_roomID").val(roomId);
            $("#edit_confirmedBy").val(confirmedBy);
        });

        // Handle delete button click
        $(document).on("click", ".delete-btn", function() {
            if (confirm("Are you sure you want to delete this booking?")) {
                const bookingId = $(this).data('booking-id');
                
                // Submit a form to delete the booking
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '';
                
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'bookingID';
                input.value = bookingId;
                
                const deleteInput = document.createElement('input');
                deleteInput.type = 'hidden';
                deleteInput.name = 'delete_booking';
                deleteInput.value = '1';
                
                form.appendChild(input);
                form.appendChild(deleteInput);
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
    </script>
    
</body>
</html>