<?php
include('../config/database.php'); 


$booking_id=$_GET['booking_id'];


$query="SELECT * FROM bookings WHERE id='$booking_id' ";
$result=mysqli_query($conn, $query);
$booking = mysqli_fetch_assoc($result);
$train_number=$booking['train_number'];

$sql="SELECT * FROM trains WHERE train_number=$train_number";
$results=mysqli_query($conn, $sql);
$trains = mysqli_fetch_assoc($results);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px gray;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
        </style>
        </head>

<body>
<div class="container">
<h2>Ticket confirmation</h2>
<p><strong>Booking ID:</strong>  <?= $booking['id'] ?></p>
<p><strong>From:</strong> <?= $booking['from_city'] ?></p>
<p><strong>To:</strong> <?= $booking['to_city'] ?></p>
<p><strong>Date of travelling:</strong> <?= $booking['travel_date'] ?></p>
<p><strong>Departure Time:</strong> <?= $trains['departure_time'] ?></p>
<p><strong>Arrival Time:</strong> <?= $trains['arrival_time'] ?></p><br>
<p><strong><i><u>Number of Passengers:</u></i></strong></p>
<p><strong>Adults :-</strong> <?= $booking['adult'] ?></p>
<p><strong>Child :-</strong> <?= $booking['child'] ?></p>
<p><strong>Infant :-</strong> <?= $booking['infant'] ?></p><br>
<p><strong><i><u>Total amount:</u></i></strong></p>
<p><strong>Price :-</strong> <?= $booking['price'] ?></p><br>

<a href="dashboard2.php?page=payment&booking_id=<?=$booking_id?>" style="font-size:20px; background-color: #17a2b8;
 color:white; padding:10px 20px; text-decoration: none; border-radius: 5px;">Continue to payment</a>
</div>
</body>
</html>

