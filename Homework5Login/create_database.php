<?php
$con = mysqli_connect("localhost", "root", "Fearandhunger2018");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query_create_db = "CREATE DATABASE IF NOT EXISTS `user`";
mysqli_query($con, $query_create_db) or die(mysqli_error($con));

echo "Database 'user' created successfully";
?>
