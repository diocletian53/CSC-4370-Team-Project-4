<?php
$host = "localhost";
$user = "ndatla1";
$pass = "ndatla1";
$dbname = "ndatla1";

//Create connection

$conn = new mysqli($host, $user, $pass, $dbname);

//Check connection
if($conn->connect_error) {
    echo "Could not connect to server\n";
    die("Connection failed: " . $conn->connect_error);
} 
else {
    echo "Connection established \n";
}
$sqlBuyers = " CREATE TABLE IF NOT EXISTS BUYERS (
	bID int(6) UNSIGNED AUTO_INCREMENT PRIMARY kEY,
	bFName VARCHAR(30) NOT NULL,
	bLName VARCHAR(30) NOT NULL,
	bUsername VARCHAR(30) NOT NULL UNIQUE,
	bPassword VARCHAR(255) NOT NULL)";

$sqlSellers = " CREATE TABLE IF NOT EXISTS SELLERS (
	sID int(6) UNSIGNED AUTO_INCREMENT PRIMARY kEY,
	bFName VARCHAR(30) NOT NULL,
	bLName VARCHAR(30) NOT NULL,
	bUsername VARCHAR(30) NOT NULL UNIQUE,
	bPassword VARCHAR(255) NOT NULL)";
	
$sqlAdmins = " CREATE TABLE IF NOT EXISTS ADMINS (
	aID int(6) UNSIGNED AUTO_INCREMENT PRIMARY kEY,
	bFName VARCHAR(30) NOT NULL,
	bLName VARCHAR(30) NOT NULL,
	bUsername VARCHAR(30) NOT NULL UNIQUE,
	bPassword VARCHAR(255) NOT NULL)";
	
if ($conn->query($sqlBuyers) === TRUE &&
    $conn->query($sqlSellers) === TRUE &&
    $conn->query($sqlAdmins) === TRUE) {
    echo "Tables created successfully \n";
} else {
    echo "Error creating tables: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bFName = $_POST["bFName"];
    $bLName = $_POST["bLName"];
    $bUsername = $_POST["bUsername"];
    $bPassword = $_POST["bPassword"];
	$role = $_POST["role"];
	
	
	
	// Determine table name based on role selected
    switch ($role) {
        case "BUYER":
            $tableName = "BUYERS";
            break;
        case "SELLER":
            $tableName = "SELLERS";
            break;
        case "ADMIN":
            $tableName = "ADMINS";
            break;
        default:
            echo "Invalid role selected";
            exit;
    }
	
	// Hash the password securely
	$hashedPassword = password_hash($bPassword, PASSWORD_DEFAULT);
	// SQL to insert data
    $sql = "INSERT INTO $tableName (bFName, bLName, bUsername, bPassword) VALUES (?, ?, ?, ?)";
    
    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);

	// Check for a prepared statement error
	if ($stmt === false) {
		die('Error in SQL: ' . htmlspecialchars($conn->error));
	}

    $stmt->bind_param("ssss", $bFName, $bLName, $bUsername, $hashedPassword);

    if ($stmt->execute()) {
		header("Location: login.php");
        echo "New record inserted successfully \n";
    } else {
        echo "Error inserting data: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>