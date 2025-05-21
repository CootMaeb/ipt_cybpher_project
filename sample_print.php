<?php
require './includes/db.php'; // Ensure $pdo is initialized here
require './vendor/autoload.php'; // mPDF autoload

// Fetch products from the database
$stmt = $pdo->query("SELECT bookingID, bookingType, check_in_Date, check_out_Date, time_in, time_out, bookingStatus, update_time, update_date,customerID, confirmedBy, roomID FROM booking");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

$mpdf = new \Mpdf\Mpdf(['format' => 'A4', 'orientation' => 'P']);

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            padding: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ffa800;
        }
        .signature-section {
            margin-top: 40px;
        }
    </style>
</head>
<body>


<img src="./images/Lexsuz_logo.jpg"  class="d-inline-block align-top" alt="" style="height: 55px; width: 55px; border-radius: 100px;">


    <h4 style="font-weight:bold;">Booking Record</h4>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Booking ID</th>
                <th>Booking Type</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Customer ID</th>
                <th>Room ID</th>
            </tr>
        </thead>
        <tbody>';

$count = 1;
foreach ($bookings as $booking) {
    $html .= '<tr>
        <td>' . $count++ . '</td>
        <td>' . htmlspecialchars($booking['bookingID']) . '</td>
        <td>' . htmlspecialchars($booking['bookingType']) . '</td>
        <td>' . htmlspecialchars($booking['check_in_Date']) . '</td>
        <td>' . htmlspecialchars($booking['check_out_Date']) . '</td>
        <td>' . htmlspecialchars($booking['customerID']) . '</td>
        <td>' . htmlspecialchars($booking['roomID']) . '</td>
    </tr>';
}

$html .= '
        </tbody>
    </table>

    <div class="signature-section">
        <div class="signature">
            <p style="font-weight:bold;">__________________________</p>
            <p style="font-weight:bold;"><strong>Hotel Manager</strong></p>
        </div>
    </div>

</body>
</html>';

$mpdf->SetHTMLFooter('
<div style="text-align: left;">
    Page {PAGENO} of {nbpg}
</div>');

$mpdf->WriteHTML($html);
$mpdf->Output('products_list.pdf', 'I'); // To display in browser
exit;
?>

