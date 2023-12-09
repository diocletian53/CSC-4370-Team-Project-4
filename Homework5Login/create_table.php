<?php
$con = mysqli_connect("localhost", "root", "Fearandhunger2018");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create 'music' database
$query_create_db = "CREATE DATABASE IF NOT EXISTS `music`";
mysqli_query($con, $query_create_db) or die(mysqli_error($con));

// Select 'music' database
mysqli_select_db($con, 'music');

// Create 'albums' table
$query_create_albums_table = "CREATE TABLE IF NOT EXISTS `albums` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `artist_id` INT NOT NULL,
    `release_date` DATE,
    `format` VARCHAR(50)
)";
mysqli_query($con, $query_create_albums_table) or die(mysqli_error($con));

// Create 'artists' table
$query_create_artists_table = "CREATE TABLE IF NOT EXISTS `artists` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `artist_name` VARCHAR(255) NOT NULL,
    `country` VARCHAR(50)
)";
mysqli_query($con, $query_create_artists_table) or die(mysqli_error($con));

echo "Tables created successfully";
?>
