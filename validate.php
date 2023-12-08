<?php
session_start();

$host = "localhost";
$user = "ndatla1";
$pass = "ndatla1";
$dbname = "ndatla1";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Determine table name based on role selected
    switch ($role) {
        case "BUYER":
            $tableName = "BUYERS";
            $redirectPage = "buyer.php";
            break;
        case "SELLER":
            $tableName = "SELLERS";
            $redirectPage = "seller.php";
            break;
        case "ADMIN":
            $tableName = "ADMINS";
            $redirectPage = "admin.php";
            break;
        default:
            echo "Invalid role selected";
            exit;
    }

    // Check credentials from the respective table
    $sql = "SELECT * FROM $tableName WHERE bUsername = ? AND bPassword = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Valid login, set session variables and redirect to respective page
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        header("Location: $redirectPage");
        exit;
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>