

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    

    <div class="form-container">
        <h2>Change Your Account Password</h2>
        <form action="" method="POST">

          <div class="form-group">
            <label>New Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
            <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required>
            </div>

            <div class="btn-container">
            <button type="submit" class="btn btn-submit">Change Password</button>
            <button type="reset" class="btn btn-reset">Reset</button>
            </div>
        </form>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>

<?php
include('../config/database.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];

    if($password===$confirm){
       // Prepare and bind
       $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hashing the password

       // Update password for admin
       $stmt = $conn->prepare("UPDATE users SET password = ? WHERE role = 'admin'");
       $stmt->bind_param("s", $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Your password is changed successfully.!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
    }
    
}
?>
