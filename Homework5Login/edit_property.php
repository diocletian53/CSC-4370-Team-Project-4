<?php
require_once('db.php');

$propertyId = $_GET['id'];
$query = "SELECT * FROM `properties` WHERE id = $propertyId";
$result = mysqli_query($con, $query);
$property = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property - Zillow</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #0066cc;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #0066cc;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004080;
        }
    </style>
</head>
<body>

<h2>Edit Property Details</h2>

<form action="update_property.php" method="post">
    <label for="location">Location:</label>
    <input type="text" name="location" value="<?php echo $property['location']; ?>" required>

    <label for="age">Age:</label>
    <input type="number" name="age" value="<?php echo $property['age']; ?>" required>

    <label for="floor_plan">Floor Plan:</label>
    <input type="text" name="floor_plan" value="<?php echo $property['floor_plan']; ?>" required>

    <label for="num_bedrooms">Number of Bedrooms:</label>
    <input type="number" name="num_bedrooms" value="<?php echo $property['num_bedrooms']; ?>" required>

    <label for="facilities">Additional Facilities:</label>
    <input type="text" name="facilities" value="<?php echo $property['facilities']; ?>" required>

    <label for="garden_presence">Presence of a Garden:</label>
    <select name="garden_presence">
        <option value="1" <?php echo $property['garden_presence'] ? 'selected' : ''; ?>>Yes</option>
        <option value="0" <?php echo !$property['garden_presence'] ? 'selected' : ''; ?>>No</option>
    </select>

    <label for="parking_availability">Parking Availability:</label>
    <select name="parking_availability">
        <option value="1" <?php echo $property['parking_availability'] ? 'selected' : ''; ?>>Yes</option>
        <option value="0" <?php echo !$property['parking_availability'] ? 'selected' : ''; ?>>No</option>
    </select>

    <label for="proximity_facilities">Proximity to Nearby Facilities:</label>
    <input type="text" name="proximity_facilities" value="<?php echo $property['proximity_facilities']; ?>" required>

    <label for="proximity_roads">Proximity to Main Roads:</label>
    <input type="text" name="proximity_roads" value="<?php echo $property['proximity_roads']; ?>" required>

    <label for="property_tax">Property Tax:</label>
    <input type="text" name="property_tax" value="<?php echo $property['property_tax']; ?>" required>

    <label for="price">Price:</label>
    <input type="text" name="price" value="<?php echo $property['price']; ?>" required>

    <input type="hidden" name="id" value="<?php echo $property['id']; ?>">
    <input type="submit" value="Update Property">
</form>

</body>
</html>
