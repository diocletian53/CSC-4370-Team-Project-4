<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
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
        <p> To enter new album data <a href="album.php" target="_blank">Click Here</a></p>
        <p> To enter new artist data <a href="artist.php" target="_blank">Click Here</a></p>
        <a href="logout.php">Logout</a>
    </div>
    <div class="footer"><h6>@copyrights- 2017</h6></div>
</div>
</body>
</html>
