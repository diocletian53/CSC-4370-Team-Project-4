<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<form action="validate.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Role:
    <select name="role">
        <option value="BUYER">BUYER</option>
        <option value="SELLER">SELLER</option>
        <option value="ADMIN">ADMIN</option>
    </select><br>
    <input type="submit" value="Login">
</form>

</body>
</html>