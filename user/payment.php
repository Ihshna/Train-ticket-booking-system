<?php
session_start();
include('../config/database.php');  // Ensure this contains database connection

// Fetch total amount from the booking
$booking_id = $_GET['booking_id'] ?? '';
$total_amount = 0;

if (!empty($booking_id)) {
    $result = mysqli_query($conn, "SELECT price FROM bookings WHERE id = '$booking_id'");
    if ($row = mysqli_fetch_assoc($result)) {
        $total_amount = $row['price'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<h2>Train Ticket Payment</h2>
<p>Total Amount: $<?= number_format($total_amount, 2) ?></p>

<!-- Stripe Payment Form -->
<form action="process_payment.php?booking_id=<?= $booking_id ?>" method="POST">
    <script 
        src="https://checkout.stripe.com/checkout.js"
        class="stripe-button"
        data-key="your_publishable_stripe_key"
        data-amount="<?= $total_amount * 100 ?>"  
        data-name="Train Ticket Booking"
        data-description="Secure Online Payment"
        data-currency="usd">
    </script>
</form>

</body>
</html>