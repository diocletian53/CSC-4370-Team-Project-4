<?php
$con = mysqli_connect("localhost", "root", "Fearandhunger2018", "user");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

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
?>
