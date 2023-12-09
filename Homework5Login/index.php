<?php
session_start();
require_once('db.php');

// Redirect to login if not logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Handle search
if (isset($_POST['submit'])) {
    $search_query = $_POST['search_query'];
    $username = $_SESSION['username'];
    $query = "SELECT * FROM album WHERE (title LIKE '%$search_query%' OR typeofalbum LIKE '%$search_query%' OR material LIKE '%$search_query%') AND username='$username'";
    $result = mysqli_query($con, $query);

    // Check for query execution success
    if ($result) {
        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='search-result'>";
                echo "<strong>Title:</strong> " . $row["title"] . "<br>";
                echo "<strong>Type:</strong> " . $row["typeofalbum"] . "<br>";
                echo "<strong>Material:</strong> " . $row["material"] . "<br>";
                echo "<strong>Price:</strong> $" . $row["price"] . "<br>";
                echo "----------------------------------------<br>";
                echo "</div>";
            }
        } else {
            echo "No results found for '$search_query'";
        }
    } else {
        echo "Error executing query: " . mysqli_error($con);
    }
} else {
    // Display user's materials
    $username = $_SESSION['username'];
    $query = "SELECT * FROM album WHERE username='$username'";
    $result = mysqli_query($con, $query);

    // Check for query execution success
    if ($result) {
        if ($result->num_rows > 0) {
            echo "<h2>Your Materials:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='material'>";
                echo "<strong>Title:</strong> " . $row["title"] . "<br>";
                echo "<strong>Type:</strong> " . $row["typeofalbum"] . "<br>";
                echo "<strong>Material:</strong> " . $row["material"] . "<br>";
                echo "<strong>Price:</strong> $" . $row["price"] . "<br>";
                echo "----------------------------------------<br>";
                echo "</div>";
            }
        } else {
            echo "No materials found.";
        }
    } else {
        echo "Error executing query: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<div class="container">
    <div class="header"><h1>Welcome to Our Site</h1></div>
    <div class="form">
        <p>Welcome <?php echo $_SESSION['username']; ?>!</p>

        <!-- Search Form -->
        <h2>Search Material</h2>
        <form action="" method="post" name="search">
            <input type="text" name="search_query" placeholder="Search by Title, Type, or Material" required />
            <input type="submit" name="submit" value="Search" />
        </form>

        <!-- Display Search Results or User's Materials -->
        <?php
        // Display handled above in PHP
        ?>

        <p> To enter new album data <a href="album.php" target="_blank">Click Here</a></p>
        <p> To enter new artist data <a href="artist.php" target="_blank">Click Here</a></p>
        <a href="logout.php">Logout</a>
    </div>
    <div class="footer"><h6>@copyrights- 2017</h6></div>
</div>

</body>
</html>
