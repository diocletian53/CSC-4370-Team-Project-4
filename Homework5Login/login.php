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
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            color: #003366; /* Zillow's blue color */
        }

        .form {
            text-align: center;
        }

        h2 {
            color: #003366; /* Zillow's blue color */
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #003366; /* Zillow's blue color */
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004080; /* Darker blue color for hover effect */
        }

        p {
            color: #555;
        }

        a {
            color: #003366; /* Zillow's blue color */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
    </style>
<body>
<div class="container">
        <div class="header">
            <h1>Welcome to Our Site</h1>
        </div>
        <div class="form">
            <h2>Log In Form</h2>
            <form action="" method="post" name="login">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
            <p>Homepage? <a href='homepageWage.html'>Homepage</a></p>
        </div>
    </div>

    <div class="footer">
        <h6>&copy; 2017</h6>
    </div>
</body>
</html>
<?php } ?>
