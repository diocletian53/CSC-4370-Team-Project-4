<?php
require_once('db.php');
session_start();

if (isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

    $query = "SELECT * FROM `users` WHERE username='$username'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php"); // Redirect user to index.php after successful login
        } else {
            echo "<div class='form'><h3>Password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    } else {
        echo "<div class='form'><h3>Username not found.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
    }
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

    <div class="container">
        <div class="header"><h1>Welcome to Our Site</h1></div>
        <div class="form">
            <h2>Log In Form </h2>
            <form action="" method="post" name="login">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <input name="submit" type="submit" value="Login" />
            </form>
            <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
        </div>
    </div>

    <div class="footer"><h6>@copyrights- 2017</h6></div>
</body>
</html>
<?php } ?>
