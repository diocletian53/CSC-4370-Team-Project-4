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

    // Search for albums
    $album_query = "SELECT * FROM album WHERE (title LIKE '%$search_query%' OR typeofalbum LIKE '%$search_query%' OR material LIKE '%$search_query%') AND username='$username'";
    $album_result = mysqli_query($con, $album_query);

    // Search for artists
    $artist_query = "SELECT * FROM artist WHERE artistname LIKE '%$search_query%'";
    $artist_result = mysqli_query($con, $artist_query);

    // Check for query execution success
    if ($album_result && $artist_result) {
        // Display album search results
        if ($album_result->num_rows > 0) {
            echo "<h2>Album Search Results:</h2>";
            while ($row = $album_result->fetch_assoc()) {
                echo "<div class='search-result'>";
                echo "<strong>Title:</strong> " . $row["title"] . "<br>";
                echo "<strong>Type:</strong> " . $row["typeofalbum"] . "<br>";
                echo "<strong>Material:</strong> " . $row["material"] . "<br>";
                echo "<strong>Price:</strong> $" . $row["price"] . "<br>";
                echo "----------------------------------------<br>";
                echo "</div>";
            }
        } else {
            echo "No album results found for '$search_query'";
        }

        // Display artist search results
        if ($artist_result->num_rows > 0) {
            echo "<h2>Artist Search Results:</h2>";
            while ($row = $artist_result->fetch_assoc()) {
                echo "<div class='search-result'>";
                echo "<strong>Artist Name:</strong> " . $row["artistname"] . "<br>";
                echo "<strong>Email:</strong> " . $row["artistemail"] . "<br>";
                echo "<strong>Phone:</strong> " . $row["artistphone"] . "<br>";
                echo "<strong>Date:</strong> " . $row["date"] . "<br>";
                echo "----------------------------------------<br>";
                echo "</div>";
            }
        } else {
            echo "No artist results found for '$search_query'";
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
        <h2>Search</h2>
        <form action="" method="post" name="search">
            <input type="text" name="search_query" placeholder="Search by Title, Type, Material, or Artist Name" required />
            <input type="submit" name="submit" value="Search" />
        </form>

        <!-- Display Search Results -->
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
