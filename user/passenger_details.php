<?php
include('../config/database.php');  // Ensure this file contains the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];

    // Insert Adult Passengers
    if (!empty($_POST['adult_name'])) {
        for ($i = 0; $i < count($_POST['adult_name']); $i++) {
            $name = mysqli_real_escape_string($conn, $_POST['adult_name'][$i]);
            $age = $_POST['adult_age'][$i];
            $gender = $_POST['adult_gender'][$i];

            $query = "INSERT INTO passengers (booking_id, name, age, gender, category) 
                      VALUES ('$booking_id', '$name', '$age', '$gender', 'Adult')";
            mysqli_query($conn, $query);
        }
    }

    // Insert Child Passengers
    if (!empty($_POST['child_name'])) {
        for ($i = 0; $i < count($_POST['child_name']); $i++) {
            $name = mysqli_real_escape_string($conn, $_POST['child_name'][$i]);
            $age = $_POST['child_age'][$i];
            $gender = $_POST['child_gender'][$i];

            $query = "INSERT INTO passengers (booking_id, name, age, gender, category) 
                      VALUES ('$booking_id', '$name', '$age', '$gender', 'Child')";
            mysqli_query($conn, $query);
        }
    }

    // Insert Infant Passengers
    if (!empty($_POST['infant_name'])) {
        for ($i = 0; $i < count($_POST['infant_name']); $i++) {
            $name = mysqli_real_escape_string($conn, $_POST['infant_name'][$i]);
            $age = $_POST['infant_age'][$i];
            $gender = $_POST['infant_gender'][$i];

            $query = "INSERT INTO passengers (booking_id, name, age, gender, category) 
                      VALUES ('$booking_id', '$name', '$age', '$gender', 'Infant')";
            mysqli_query($conn, $query);
        }
    }

    // Redirect to payment page after successful insertion
    header("Location: dashboard2.php?page=ticket&booking_id=$booking_id");
    exit();
} else {
    echo "Invalid request.";
}
?>
