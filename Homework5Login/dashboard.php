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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
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

        .property-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
        }

        .property-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .property-card p {
            margin: 0 0 10px;
        }

        .property-card a {
            text-decoration: none;
            background-color: #333;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            display: inline-block;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border-radius: 0 0 8px 8px;
        }    </style>
</head>
<body>

<div class="container">
    <div class="header"><h1>Welcome, <?php echo $_SESSION['username'] ?? 'Guest'; ?>!</h1></div>
    <div class="form">
        <h2>Your Properties</h2>

        <?php
        // Display properties
        if ($properties) {
            while ($row = mysqli_fetch_assoc($properties)) {
                echo "<div class='property-card'>";
                $imagePath = !empty($row['image']) ? 'upload/' . $row['image'] : 'build.jpg';
                echo "<img src='" . $imagePath . "' alt='Property Image' />";
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
                echo "<a href='view_property.php?id=" . $row['id'] . "'>View Details</a>";
                echo "</div>";
            }
        } else {
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
