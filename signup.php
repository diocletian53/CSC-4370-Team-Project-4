<!DOCTYPE html>
<html>
<head>
    <title>Insert Data into Tables</title>
</head>
<body>

<form action="insert_data.php" method="post">
    First Name: <input type="text" name="bFName"><br>
    Last Name: <input type="text" name="bLName"><br>
    Username: <input type="text" name="bUsername"><br>
    Password: <input type="password" name="bPassword"><br>
	Role:
    <select name="role">
        <option value="BUYER">BUYER</option>
        <option value="SELLER">SELLER</option>
        <option value="ADMIN">ADMIN</option>
    </select><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>