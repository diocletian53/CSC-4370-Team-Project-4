<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Album Data</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php
require_once('db.php');

if (isset($_REQUEST['title'])) {
    $title = stripslashes($_REQUEST['title']);
    $typeofalbum = stripslashes($_REQUEST['typeofalbum']);
    $material = stripslashes($_REQUEST['material']);
    $price = $_REQUEST['price'];
    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into `album` (title, typeofalbum, material, price,trn_date) VALUES ('$title', '$typeofalbum', '$material','$price','$trn_date')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<div class='container'>
        <div class='header'><h1>Welcome to Our Site</h1></div>
        <div class='form'><h3>Your album data inserted successfully.</h3><br/>Click here to <a href='viewalbum.php'>View</a></div></div></div>";
    }
} else {
    ?>
    <div class="container">
        <div class="header"><h1>Welcome to Our Site</h1></div>
        <div class="form">
            <h2>Album Form</h2>
            <form name="registration" action="" method="post">
                <input type="text" name="title" placeholder="Title" required />
                <input type="text" name="typeofalbum" placeholder="Type eg: pop" required />
                <input type="text" name="material" placeholder="Material eg:CD,DVD..ec" required />
                <input type="text" name="price" placeholder="Price" required>
                <input type="submit" name="submit" value="Submit" />
            </form>
            <br /><br />
        </div>
    <?php } ?>

    <div class="footer"><h6>@copyrights- 2017</h6></div>
    </div>
</body>
</html>
