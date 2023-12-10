<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zillow Admin Dashboard</title>
    <!-- Include your CSS stylesheets here -->
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<style>
    body {
    font-family: 'Roboto', sans-serif;
    background-color: #f8f8f8;
    color: #333;
    margin: 0;
}

header {
    background-color: #3498db;
    color: #fff;
    padding: 20px;
    text-align: center;
}

nav {
    background-color: #2c3e50;
    color: #fff;
    padding: 10px;
}

nav ul {
    list-style-type: none;
    text-align: center;
}

nav li {
    display: inline-block;
    margin: 0 15px;
}

nav a {
    text-decoration: none;
    color: #ecf0f1;
    font-weight: bold;
    font-size: 16px;
    transition: color 0.3s ease;
}

nav a:hover {
    color: #bdc3c7;
}

main {
    padding: 20px;
}

section {
    background-color: #fff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #3498db;
}

ul {
    list-style-type: none;
}

li {
    margin-bottom: 10px;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #1e6da8;
}

footer {
    background-color: #34495e;
    color: #ecf0f1;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
<body>

<header>
    <h1>Zillow Admin Dashboard</h1>
</header>

<nav>
    <ul>
        <li><a href="#dashboard">Dashboard</a></li>
        <li><a href="#properties">Manage Properties</a></li>
        <li><a href="#users">Manage Users</a></li>
        <li><a href="#reports">Reports</a></li>
        <li><a href="#logout">Logout</a></li>
    </ul>
</nav>

<main>
    <section id="dashboard">
        <h2>Admin Dashboard Overview</h2>
        <!-- Display key metrics and information here -->
        <p>Total Properties: 1000</p>
        <p>Total Users: 500</p>
        <p>Revenue: $1,000,000</p>
    </section>

    <section id="properties">
        <h2>Manage Properties</h2>
        <!-- Add property management functionality here -->
        <ul>
            <li>Property 1 - Edit | Delete</li>
            <li>Property 2 - Edit | Delete</li>
            <li>Property 3 - Edit | Delete</li>
        </ul>
    </section>

    <section id="users">
        <h2>Manage Users</h2>
        <!-- Add user management functionality here -->
        <ul>
            <li>User 1 - Edit | Delete</li>
            <li>User 2 - Edit | Delete</li>
            <li>User 3 - Edit | Delete</li>
        </ul>
    </section>

    <section id="reports">
        <h2>Reports</h2>
        <!-- Add reporting functionality here -->
        <p>Generate and download various reports.</p>
    </section>
</main>

<footer>
    <p>&copy; 2023 Zillow. All rights reserved.</p>
</footer>

<!-- Include your JavaScript files here -->
<!-- <script src="script.js"></script> -->

</body>
</html>
