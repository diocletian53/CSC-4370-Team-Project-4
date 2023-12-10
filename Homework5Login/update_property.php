<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $propertyId = $_POST['id'];
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $age = $_POST['age'];
    $floorPlan = mysqli_real_escape_string($con, $_POST['floor_plan']);
    $numBedrooms = $_POST['num_bedrooms'];
    $facilities = mysqli_real_escape_string($con, $_POST['facilities']);
    $gardenPresence = $_POST['garden_presence'];
    $parkingAvailability = $_POST['parking_availability'];
    $proximityFacilities = mysqli_real_escape_string($con, $_POST['proximity_facilities']);
    $proximityRoads = mysqli_real_escape_string($con, $_POST['proximity_roads']);
    $propertyTax = $_POST['property_tax'];
    $price = $_POST['price'];

    // Update property details in the database
    $updateQuery = "UPDATE `properties` SET 
                    location = '$location', 
                    age = $age,
                    floor_plan = '$floorPlan',
                    num_bedrooms = $numBedrooms,
                    facilities = '$facilities',
                    garden_presence = $gardenPresence,
                    parking_availability = $parkingAvailability,
                    proximity_facilities = '$proximityFacilities',
                    proximity_roads = '$proximityRoads',
                    property_tax = $propertyTax,
                    price = $price
                    WHERE id = $propertyId";

    $result = mysqli_query($con, $updateQuery);

    if ($result) {
        // Redirect back to the dashboard on success
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating property details: " . mysqli_error($con);
    }
} else {
    // If accessed without submitting the form, redirect to the edit_property page
    header("Location: edit_property.php?id=" . $_POST['id']);
    exit();
}
?>
