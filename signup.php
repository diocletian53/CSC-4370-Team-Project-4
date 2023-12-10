<!DOCTYPE html>
<html class="signup_php">
<head>
    <title>Insert Data into Tables</title>
    <link rel="stylesheet" href="signup_login.css">
</head>
<body>
<div class = "container2">
<h1>SIGN UP</h1>
<form action="insert_data.php" method="post">
   <div> <input type="text" name="bFName" placeholder="First Name"></div><br>
   <div> <input type="text" name="bLName" placeholder="Last Name"></div><br>
   <div> <input type="text" name="bUsername" placeholder="Username"></div><br>
   <div> <input type="password" name="bPassword" placeholder="Password"></div><br>
	<div>Role:
    <select name="role">
        <option value="BUYER">BUYER</option>
        <option value="SELLER">SELLER</option>
        <option value="ADMIN">ADMIN</option>
    </select></div><br>
    <input type="submit" value="Create Account">
</form>
</div>
</body>
</html>