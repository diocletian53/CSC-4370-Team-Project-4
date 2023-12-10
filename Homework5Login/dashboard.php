<?php
session_start();
require_once('db.php');

// Ensure the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Function to get all properties from the database
function getAllProperties($con) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM `properties` WHERE user_id = (SELECT id FROM users WHERE username = '$username')";
    $result = mysqli_query($con, $query);
    return $result;
}

// Fetch all properties
$properties = getAllProperties($con);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<div class="container">
    <div class="header"><h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1></div>
    <div class="form">
        <h2>Your Properties</h2>

        <?php
        // Display properties
        while ($row = mysqli_fetch_assoc($properties)) {
            echo "<div class='property-card'>";
            echo "<img src='property_image.jpg' alt='Property Image' />";
            echo "<p>Location: " . $row['location'] . "</p>";
            echo "<p>Age: " . $row['age'] . " years</p>";
            echo "<p>Floor Plan: " . $row['floor_plan'] . "</p>";
            echo "<p>Number of Bedrooms: " . $row['num_bedrooms'] . "</p>";
            echo "<p>Additional Facilities: " . $row['facilities'] . "</p>";
            echo "<p>Presence of a Garden: " . ($row['garden_presence'] ? 'Yes' : 'No') . "</p>";
            echo "<p>Parking Availability: " . ($row['parking_availability'] ? 'Yes' : 'No') . "</p>";
            echo "<p>Proximity to Nearby Facilities: " . $row['proximity_facilities'] . "</p>";
            echo "<p>Proximity to Main Roads: " . $row['proximity_roads'] . "</p>";
            echo "<p>Property Tax: $" . $row['property_tax'] . "</p>";
            echo "<p>Price: $" . $row['price'] . "</p>";
            // Add other property details as needed
            echo "<a href='view_property.php?id=" . $row['id'] . "'>View Details</a>";
            echo "</div>";
        }

        // If no properties, display a message
        if (mysqli_num_rows($properties) == 0) {
            echo "<p>No properties found. Click the button below to add a new property.</p>";
        }
        ?>

        <br /><br />
        <a href="add_property.php">Add New Property</a>
        <br /><br />
        <a href="logout.php">Logout</a>
        <br /><br />
        <a href="index.php">Go to Index</a>
    </div>
    <div class="footer"><h6>@copyrights- 2017</h6></div>
</div>

</body>
</html>
