<?php
$con = mysqli_connect("localhost", "root", "Fearandhunger2018");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create 'user' database
$query_create_db = "CREATE DATABASE IF NOT EXISTS `user`";
mysqli_query($con, $query_create_db) or die(mysqli_error($con));

echo "Database 'user' created successfully";

// Switch to 'user' database
mysqli_select_db($con, "user") or die(mysqli_error($con));

// Create 'users' table
$query_create_users_table = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `trn_date` datetime NOT NULL,
    PRIMARY KEY (`id`)
)";
mysqli_query($con, $query_create_users_table) or die(mysqli_error($con));

echo "Table 'users' created successfully";

// Select 'user' database for further operations
mysqli_select_db($con, 'user') or die(mysqli_error($con));

// Create 'album' table
$query_create_album_table = "CREATE TABLE IF NOT EXISTS `album` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `typeofalbum` VARCHAR(255) NOT NULL,
    `material` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `trn_date` DATETIME NOT NULL,
    `username` VARCHAR(50) NOT NULL
)";
mysqli_query($con, $query_create_album_table) or die(mysqli_error($con));

echo "Table 'album' created successfully";
?>
