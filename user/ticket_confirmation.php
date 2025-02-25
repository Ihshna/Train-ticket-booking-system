<?php
session_start();
include('../config/database.php'); 

$booking_id = $_GET['booking_id'] ?? '';

// Fetch payment details
$result = mysqli_query($conn, "SELECT * FROM payments WHERE booking_id = '$booking_id'");
$payment = mysqli_fetch_assoc($result);

// Fetch booking details
$booking_result = mysqli_query($conn, "SELECT * FROM bookings WHERE id = '$booking_id'");
$booking = mysqli_fetch_assoc($booking_result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Confirmation</title>
</head>
<body>

<h2>Ticket Confirmation</h2>
<p><strong>Booking ID:</strong> <?= $booking['id'] ?></p>
<p><strong>Train:</strong> <?= $booking['train_name'] ?></p>
<p><strong>Passenger Name:</strong> <?= $booking['passenger_name'] ?></p>
<p><strong>Departure:</strong> <?= $booking['departure_city'] ?></p>
<p><strong>Arrival:</strong> <?= $booking['arrival_city'] ?></p>
<p><strong>Total Amount Paid:</strong> $<?= number_format($payment['total_amount'] / 100, 2) ?></p>
<p><strong>Payment Status:</strong> <?= $payment['status'] ?></p>

</body>
</html>
