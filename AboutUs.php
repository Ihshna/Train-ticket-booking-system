<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        .header {
            background: #2c3e50;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
        }

        .content {
            margin: 10px 0;
        }

        /*Image*/
.center-image {
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: 60%;
    height: auto;
    border: 5px solid #ddd;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    opacity:0;
    transform:translateX(-100%);
    animation:slideIn 1s forwards;
  }

  @keyframes slideIn{
    to{
        opacity:1;
        transform: translateX(0);

    }
  }
  
 .center-image:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }


        .container p {
            font-size: 1rem;
            color: #000000e3;
            padding: 1rem 0;
            text-align: left;
        }

        h2 {
            text-align: left;
            color: #333;
        }

    </style>


</head>

<body>

    <div class="header">
        <h1>About Us</h1>
    </div>
    <div class="container">
        <div class="content">
            <h2>Welcome to Our Train Ticket Booking System</h2>
            <p>We are dedicated to providing a seamless and efficient way to book train tickets online. Our system is
                designed to offer convenience, reliability, and affordability for travelers across the country.</p>
            <img src="../assets/images/Slide4.jpg" class="center-image"/> 
            

   
            <h2>Why Choose Us?</h2>
            <p>Our platform ensures a hassle-free booking experience, secure payment options, and real-time updates on
                train schedules. Whether you're a daily commuter or planning a long journey, we've got you covered.</p>
            <p>In Current Train Ticket Booking System Project User faces various difficulties while booking their
                tickets by visiting to the reservation counter or by visiting to the agents. Train Ticket Booking System
                Project will save customers time and money as well. User will get the facility of making their payments
                of their choice and get entire information after reservations and many more of the login screen.

            </p>
            <p> Finding trains between given routes through simple search query on particular date and displaying all
                details of that particular train such as arrival time, departure time, number of seats available, class
                type, charges details and many more. Users will also able to update their profiles and can get details
                related to their transactions.

            </p>
            <p> Current Train Ticket Booking System does not provide facility of self-cancellation and other facilities
                such as shortest route details from their current locations. It does not provide details of their
                previous booking history as well as festive session offer/discounts details. Through this system, user
                will able to perform various activities using a single windows panel.

            </p>
            <p> To access this Train Ticket Booking System Project, users have to register by giving their entire
                details such as their name, full address details, sex, age, occupation, date of birth, nationality,
                mobile number, email id. After successful registration, users will be provided with their login id and
                password. In Current Train Ticket Booking System Project User faces various difficulties while booking
                their tickets by visiting to the reservation counter or by visiting to the agents. <br> Train Ticket Booking
                System Project will save customers time and money as well. User will get the facility of making their
                payments of their choice and get entire information after reservations and many more of the login
                screen. Finding trains between given routes through simple search query on particular date and
                displaying all details of that particular train such as arrival time, departure time, number of seats
                available, class type, charges details and many more. <br> Users will also able to update their profiles and
                can get details related to their transactions. Current Train Ticket Booking System does not provide
                facility of self-cancellation and other facilities such as shortest route details from their current
                locations.
                <br> It does not provide details of their previous booking history as well as festive /discounts
                details.
            </p>
            <img src="../assets/images/Slide1.jpg" class="center-image"/> 
        </div>
    </div>
    </body>
    
