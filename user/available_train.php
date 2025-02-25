<?php
include('../config/database.php'); 

$query = "SELECT * FROM bookings ORDER BY id DESC LIMIT 1"; 
$result = mysqli_query($conn, $query);
$booking = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Available Trains</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f2f2f2;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .passenger-section {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4);
            margin-top: 20px;
        }

        
        .add-btn {
            background: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            display: block;
            margin: 10px auto;
        }
        .add-btn:hover {
            background: #0056b3;
        }
        .remove-btn {
            background: red;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            display: block;
            margin: 10px auto;
        }
        .remove-btn:hover {
            background: darkred;
        }

        .center-image{
            display:block;
            margin-left:auto;
            margin-right: auto;
            max-width: 50%;
            height:auto;
            border:5px solid #ddd;
            border-radius:15px;
            box-shadow:0 4px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>

    <h2>Available Train Details</h2>
    <table>
        <tr>
            <th>Train Number</th>
            <th>From City</th>
            <th>To City</th>
            <th>Date</th>
            <th>Passengers</th>
            <th>Class</th>
            <th>Total Price</th>
        </tr>
        <tr>
            <td><?= $booking['train_number'] ?></td>
            <td><?= $booking['from_city'] ?></td>
            <td><?= $booking['to_city'] ?></td>
            <td><?= $booking['travel_date'] ?></td>
            <td><?= $booking['adult'] + $booking['child'] + $booking['infant'] ?></td>
            <td><?= $booking['class'] ?></td>
            <td><?= $booking['price'] ?></td>
        </tr>
    </table><br>
    <img src="../assets/images/ticket.jpg" class="center-image"/>

    <!-- Passenger Details Section -->
    <div class="passenger-section">
        <h2>Enter Passenger Details</h2>
        <form action="passenger_details.php" method="POST">
            <input type="hidden" name="booking_id" value="<?= $booking['id'] ?>">

            <!-- Adults Section -->
            <h3>Adult Passengers</h3>
            <div id="adult-section">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="adult_name[]" style=" height:30px; width:60%;" required></td>
                        <td><input type="number" name="adult_age[]" style=" height:30px; width:60%;"required></td>
                        <td>
                            <input type="radio" name="adult_gender[0]" value="Male" required> Male
                            <input type="radio" name="adult_gender[0]" value="Female"> Female
                        </td>
                        <td> <button type="button" class="add-btn" onclick="addAdult()" style="text-align:center; width:70%;">Add</button></td>
                    </tr>
                </table>
            </div>
           

            <!-- Children Section -->
            <h3>Child Passengers</h3>
            <div id="child-section">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="child_name[]"style=" height:30px; width:60%;" required></td>
                        <td><input type="number" name="child_age[]" style=" height:30px; width:60%;" required></td>
                        <td>
                            <input type="radio" name="child_gender[0]" value="Male" required> Male
                            <input type="radio" name="child_gender[0]" value="Female"> Female
                        </td>
                        <td> <button type="button" class="add-btn" onclick="addChild()" style="text-align:center; width:70%;">Add</button></td>
                    </tr>
                </table>
            </div>
            

            <!-- Infants Section -->
            <h3>Infant Passengers</h3>
            <div id="infant-section">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="infant_name[]"  style=" height:30px; width:60%;" required></td>
                        <td><input type="number" name="infant_age[]"  style=" height:30px; width:60%;" required></td>
                        <td>
                            <input type="radio" name="infant_gender[0]" value="Male" required> Male
                            <input type="radio" name="infant_gender[0]" value="Female"> Female
                        </td>
                        <td><button type="button" class="add-btn" onclick="addInfant()" style="text-align:center; width:70%;">Add</button></td>
                    </tr>
                </table>
            </div>
            

            <button type="submit" class="btn btn-submit">Ticket overview</button>
        </form>
    </div>

    <script>
        let adultCount = 1, childCount = 1, infantCount = 1;

        function addAdult() {
            let section = document.getElementById("adult-section");
            let table = document.createElement("table");
            table.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="adult_name[]" required></td>
                    <td><input type="number" name="adult_age[]" required></td>
                    <td>
                        <input type="radio" name="adult_gender[${adultCount}]" value="Male" required> Male
                        <input type="radio" name="adult_gender[${adultCount}]" value="Female"> Female
                    </td>
                    <td><button type="button" class="remove-btn" onclick="removeTable(this)">Remove</button></td>
                </tr>
            `;
            section.appendChild(table);
            adultCount++;
        }

        function addChild() {
            let section = document.getElementById("child-section");
            let table = document.createElement("table");
            table.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="child_name[]" required></td>
                    <td><input type="number" name="child_age[]" required></td>
                    <td>
                        <input type="radio" name="child_gender[${childCount}]" value="Male" required> Male
                        <input type="radio" name="child_gender[${childCount}]" value="Female"> Female
                    </td>
                    <td><button type="button" class="remove-btn" onclick="removeTable(this)">Remove</button></td>
                </tr>
            `;
            section.appendChild(table);
            childCount++;
        }

        function removeTable(button) {
            button.closest("table").remove();
        }
    </script>

</body>
</html>
