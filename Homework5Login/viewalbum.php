<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View album</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<div class="container">
    <div class="header"><h1>Welcome to Our Site</h1></div>
    <div class="form">
        <?php
        require_once('db.php');

        $query = "SELECT * FROM album";
        $result = mysqli_query($con, $query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Title: " . $row["title"] . " - Type: " . $row["typeofalbum"] . " - Material: " . $row["material"] . " - Price: " . $row["price"] . " <br>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
    <div class="footer"><h6>@copyrights- 2017</h6></div>
</div>
</body>
</html>
