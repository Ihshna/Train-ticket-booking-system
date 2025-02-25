<?php
include('../config/database.php');// Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $train_number = $_POST['train_number'];
    $from_city = $_POST['from_city'];
    $to_city = $_POST['to_city'];
    $date = $_POST['travel_date'];
    $adults = $_POST['adult'];
    $child = $_POST['child'];
    $infants = $_POST['infant'];
    $class_type = $_POST['class'];

    // Price Calculation
    $price_per_adult = ($class_type == 'AC') ? 1500 : (($class_type == 'Sleeper') ? 1000 : 500);
    $price_per_child = $price_per_adult * 0.5;
    $price_per_infant = 0;

    $total_price = ($adults * $price_per_adult) + ($child * $price_per_child) + ($infants * $price_per_infant);

    // Insert into database
    $query = "INSERT INTO bookings (train_number, from_city, to_city, travel_date, adult, child, infant, class, price) 
              VALUES ('$train_number', '$from_city', '$to_city', '$date', '$adults', '$child', '$infants', '$class_type', '$total_price')";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard2.php?page=available_train");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<div class="form-container">
    <h2>Book your ticket</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <label for="passengers_cat">Train number</label>
      <input type="text" name="train_number"></div>
    <div class="form-group">
        <label>From city</label>
        <select name="from_city" required>
            <option value="anuradhapura">Anuradhapura</option>
            <option value="Avissawella">Avissawella</option>
            <option value="Badulla">Badulla</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Colombo Fort">Colombo Fort</option>
            <option value="Galle">Galle</option>
            <option value="Jaffna">Jaffna</option>
            <option value="Kandy">Kandy</option>
            <option value="Mannar">Mannar</option>
            <option value="Maradana">Maradana</option>
            <option value="Matale">Matale</option>
            <option value="Matara">Matara</option>
            <option value="Peradeniya">Peradeniya</option>
            <option value="Ragama">Ragama</option>
            <option value="Talaimannar">Talaimannar</option>
            <option value="Trincomalee">Trincomalee</option>
            
        </select>
    </div>
    
    <div class="form-group">
        <label>To city</label>
        <select name="to_city" required>
            <option value="anuradhapura">Anuradhapura</option>
            <option value="Avissawella">Avissawella</option>
            <option value="Badulla">Badulla</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Colombo Fort">Colombo Fort</option>
            <option value="Galle">Galle</option>
            <option value="Jaffna">Jaffna</option>
            <option value="Kandy">Kandy</option>
            <option value="Mannar">Mannar</option>
            <option value="Maradana">Maradana</option>
            <option value="Matale">Matale</option>
            <option value="Matara">Matara</option>
            <option value="Peradeniya">Peradeniya</option>
            <option value="Ragama">Ragama</option>
            <option value="Talaimannar">Talaimannar</option>
            <option value="Trincomalee">Trincomalee</option>
            
        </select>
    </div>

    <div class="form-group">
   <label for="date">Date:</label>
   <input type="date" name="travel_date" required>
   </div>

   <div class="form-group">
   <label for="passengers_cat">Passengers:</label>
      <input type="number" name="adult" id="adult" style="width:30%;" placeholder="Number of adults" min="0">
    <br>  
      <input type="number" name="child" id="child" style="width:30%;" placeholder="Number of child" min="0">
    <br>  
      <input type="number"name="infant" id="infant" style="width:30%;" placeholder="Number of infant"  min="0">
   </div>

   
    <label for="class" style="font-weight:bold;">Class:</label>
     
    <input type="radio" id="ac" name="class" value="AC">
    <label for="ac">AC</label>
    
    <input type="radio" id="sleeper" name="class" value="Sleeper" >
    <label for="sleeper">Sleeper</label>

    <input type="radio" id="general"name="class" value="Normal" >
    <label for="normal">Normal</label>
    

     <div class="btn-container">
    <button type="submit" class="btn btn-submit">Submit</button>
    <button type="submit" class="btn btn-reset">Reset</button>
    </div>
    </form>
    </div>
    


