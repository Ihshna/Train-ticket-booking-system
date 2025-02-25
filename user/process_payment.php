<?php
session_start();
include('../config/database.php'); 
require_once '../stripe-php-master/init.php'; // Include the Stripe PHP SDK

// Set Stripe API Key
\Stripe\Stripe::setApiKey('sk_test_51QwK7RISHeXJbO7DYc6YHBFoPqtr0UUcmq4Rl8Ogz4vdUgLPBxZvWx3M2LViFqtY0B1b402ItAolQngLs72l9kXL009zvh86gV');

$booking_id = $_GET['booking_id'] ?? '';
$total_amount = $_POST['total_amount'] * 100; // Convert to cents
$token = $_POST['stripeToken']; // Payment token from Stripe

try {
    // Charge the customer's card
    $charge = \Stripe\Charge::create([
        "amount" => $total_amount,
        "currency" => "lkr",
        "source" => $token,
        "description" => "Train Ticket Payment"
    ]);

    // Insert payment record into the database
    $query = "INSERT INTO payments (booking_id, total_amount, status) VALUES ('$booking_id', '$total_amount', 'Paid')";
    mysqli_query($conn, $query);

    // Redirect to ticket confirmation page
    echo "<script>alert('Payment Successful!'); window.location.href='ticket_confirmation.php?booking_id=$booking_id';</script>";
} catch (\Stripe\Exception\CardException $e) {
    echo "<script>alert('Payment Failed: " . $e->getMessage() . "');</script>";
}
?>