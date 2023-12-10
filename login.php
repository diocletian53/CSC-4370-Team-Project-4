<!DOCTYPE html>
<html class="login_php">
    <title>Login Page</title>
    <link rel="stylesheet" href="signup_login.css">
</head>
<body>

<div class = "container1">
    <h1>LOGIN</h1>
<form action="validate.php" method="post">
<div><input type="text" name="bUsername" placeholder="Username"></div><br>
<div>    <input type="password" name="bPassword" placeholder="Password"></div><br>
<div>    Role:
       <select name="role">
        <option value="BUYER">BUYER</option>
        <option value="SELLER">SELLER</option>
        <option value="ADMIN">ADMIN</option>
    </select></div><br>
   <div> <input type="submit" value="Login"> </div>
    
</form><br>
<form action = "signup.php">
<div class = "sign-up">Not registered?<input type="submit" value="Sign Up" href="signup.php"></div>
</form>
</div>

</body>
</html>