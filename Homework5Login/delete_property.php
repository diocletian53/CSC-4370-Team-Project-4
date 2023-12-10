<?php
require_once('db.php');

// Check if property ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$propertyId = mysqli_real_escape_string($con, $_GET['id']);

// Delete property from the database
$deleteQuery = "DELETE FROM `properties` WHERE id = $propertyId";
$result = mysqli_query($con, $deleteQuery);

if ($result) {
    // Redirect back to the dashboard on success
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error deleting property: " . mysqli_error($con);
}
?>
