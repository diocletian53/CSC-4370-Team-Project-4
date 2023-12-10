<?php
require('db.php');

if (isset($_POST['submit'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $trn_date = date("Y-m-d H:i:s");

    // Added code to handle user_type
    $user_type = mysqli_real_escape_string($con, $_POST['user_type']);

    $query = "INSERT into `users` (username, password, email, user_type, trn_date) VALUES ('$username', '$hashed_password', '$email', '$user_type', '$trn_date')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<div class='form'><h3>You are registered successfully.</h3>";
        echo "<meta http-equiv='refresh' content='2;url=login.php'>";
        echo "</div>";
    } else {
        echo "<div class='form'><h3>Registration failed: " . mysqli_error($con) . "</h3><br/>Click here to <a href='registration.php'>Register</a></div>";
    }
    
} else {
?>
<!DOCTYPE html>
<html>
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
                <select name="user_type" required>
                <option value="buyer">Buyer</option>
                <option value="seller">Seller</option>
                  <option value="admin">Admin</option>
                    </select>
   



            </form>
            <br /><br />
        </div>
    </div>

    <div class="footer"><h6>@copyrights- 2017</h6></div>
</body>

</html>
<?php } ?>
