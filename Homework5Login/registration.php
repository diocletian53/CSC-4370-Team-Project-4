<?php
require('db.php');

// If form submitted, insert values into the database.
if (isset($_POST['submit'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $trn_date = date("Y-m-d H:i:s");

    $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '$hashed_password', '$email', '$trn_date')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
    } else {
        echo "<div class='form'><h3>Registration failed: " . mysqli_error($con) . "</h3><br/>Click here to <a href='registration.php'>Register</a></div>";
    }
} else {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <div class="container">
        <div class="header"><h1>Welcome to Our Site</h1></div>
        <div class="form">
            <h2>Registration Form</h2>
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="Register" />
            </form>
            <br /><br />
        </div>
    </div>

    <div class="footer"><h6>@copyrights- 2017</h6></div>
</body>

</html>
<?php } ?>
