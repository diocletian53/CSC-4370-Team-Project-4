<?php
session_start();
require_once('db.php');

// Ensure the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $floor_plan = mysqli_real_escape_string($con, $_POST['floor_plan']);
    $num_bedrooms = mysqli_real_escape_string($con, $_POST['num_bedrooms']);
    $facilities = mysqli_real_escape_string($con, $_POST['facilities']);
    $garden_presence = isset($_POST['garden_presence']) ? 1 : 0;
    $parking_availability = isset($_POST['parking_availability']) ? 1 : 0;
    $proximity_facilities = mysqli_real_escape_string($con, $_POST['proximity_facilities']);
    $proximity_roads = mysqli_real_escape_string($con, $_POST['proximity_roads']);
    
    // Additional field: Property tax records - calculate 7% of value
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $property_tax = 0.07 * $price;

    $username = $_SESSION['username'];

    // Insert the property into the database
    $query = "INSERT INTO `properties` (user_id, location, age, floor_plan, num_bedrooms, facilities, 
              garden_presence, parking_availability, proximity_facilities, proximity_roads, property_tax, price, trn_date) 
              VALUES ((SELECT id FROM users WHERE username = '$username'), '$location', '$age', '$floor_plan', 
              '$num_bedrooms', '$facilities', '$garden_presence', '$parking_availability', '$proximity_facilities', 
              '$proximity_roads', '$property_tax', '$price', NOW())";
    mysqli_query($con, $query) or die(mysqli_error($con));

    // Redirect to the dashboard
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Property</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
        /* Additional CSS styles for better appearance */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
        }

        .header {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }

        .header h1 {
            margin: 0;
        }

        .form {
            padding: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input, form textarea, form select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        form input[type="checkbox"] {
            width: auto;
            margin-top: 5px;
        }

        .form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form a {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #4CAF50;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border-radius: 0 0 8px 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header"><h1>Add a New Property</h1></div>
    <div class="form">
        <form action="" method="post">
            <label for="location">Location:</label>
            <input type="text" name="location" required />

            <label for="age">Age:</label>
            <input type="number" name="age" required />

            <label for="floor_plan">Floor Plan:</label>
            <input type="text" name="floor_plan" required />

            <label for="num_bedrooms">Number of Bedrooms:</label>
            <input type="number" name="num_bedrooms" required />

            <label for="facilities">Additional Facilities:</label>
            <input type="text" name="facilities" required />

            <label for="garden_presence">Presence of a Garden:</label>
            <input type="checkbox" name="garden_presence" />

            <label for="parking_availability">Parking Availability:</label>
            <input type="checkbox" name="parking_availability" />

            <label for="proximity_facilities">Proximity to Nearby Facilities:</label>
            <input type="text" name="proximity_facilities" required />

            <label for="proximity_roads">Proximity to Main Roads:</label>
            <input type="text" name="proximity_roads" required />

            <label for="price">Price:</label>
            <input type="number" name="price" required />

            <input type="submit" value="Add Property" />
        </form>
        <br />
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
    <div class="footer"><h6>@copyrights- 2017</h6></div>
</div>

</body>
</html>
