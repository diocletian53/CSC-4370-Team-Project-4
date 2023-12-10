<?php
session_start();
require_once('db.php');

// Ensure the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Check if property ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

// Get property details from the database
$property_id = mysqli_real_escape_string($con, $_GET['id']);
$query = "SELECT * FROM `properties` WHERE id = '$property_id'";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: dashboard.php");
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Property</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<div class="container">
    <div class="header"><h1>Property Details</h1></div>
    <div class="form">
        <h2>Location: <?php echo $row['location']; ?></h2>
        <p>Age: <?php echo $row['age']; ?></p>
        <p>Floor Plan: <?php echo $row['floor_plan']; ?></p>
        <p>Number of Bedrooms: <?php echo $row['num_bedrooms']; ?></p>
        <p>Additional Facilities: <?php echo $row['facilities']; ?></p>
        <p>Presence of a Garden: <?php echo $row['garden_presence'] ? 'Yes' : 'No'; ?></p>
        <p>Parking Availability: <?php echo $row['parking_availability'] ? 'Yes' : 'No'; ?></p>
        <p>Proximity to Nearby Facilities: <?php echo $row['proximity_facilities']; ?></p>
        <p>Proximity to Main Roads: <?php echo $row['proximity_roads']; ?></p>
        <p>Property Tax: $<?php echo $row['property_tax']; ?></p>
        <p>Price: $<?php echo $row['price']; ?></p>

        <!-- Display other property details as needed -->

        <br /><br />
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
    <div class="footer"><h6>@copyrights- 2017</h6></div>
</div>

</body>
</html>
