<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zillow Buyer Dashboard</title>
    <!-- Include your CSS stylesheets here -->
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<style>
    /* Reset some default browser styles */
body, h1, h2, h3, p, ul, li, form, label, button {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

header, nav, main, footer {
    margin: 20px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
}

header h1 {
    color: #333;
}

nav ul {
    list-style-type: none;
}

nav ul li {
    display: inline-block;
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: #3498db;
    font-weight: bold;
}

nav a:hover {
    color: #1e6da8;
}

main {
    margin-top: 20px;
}

section {
    margin-bottom: 20px;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #1e6da8;
}

footer {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
    color: #777;
}

    </style>
<body>

<header>
    <h1>Zillow Buyer Dashboard</h1>
</header>

<nav>
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#saved-properties">Saved Properties</a></li>
        <li><a href="#search">Property Search</a></li>
        <li><a href="#profile">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<main>
    <section id="home">
        <h2>Welcome to your Zillow Buyer Dashboard!</h2>
        <p>Explore the features below:</p>
    </section>

    <section id="saved-properties">
        <h2>Saved Properties</h2>
        <ul>
            <!-- Display saved properties here -->
            <li>Property 1</li>
            <li>Property 2</li>
            <li>Property 3</li>
        </ul>
    </section>

    <section id="search">
        <h2>Property Search</h2>
        <!-- Add property search form here -->
        <form>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" placeholder="Enter location">

            <label for="min-price">Min Price:</label>
            <input type="number" id="min-price" name="min-price" placeholder="Min Price">

            <label for="max-price">Max Price:</label>
            <input type="number" id="max-price" name="max-price" placeholder="Max Price">

            <button type="submit">Search</button>
        </form>
    </section>

    <section id="profile">
        <h2>Profile</h2>
        <!-- Display user profile information here -->
        <p>Name: John Doe</p>
        <p>Email: john.doe@example.com</p>
    </section>
</main>

<footer>
    <p>&copy; 2023 Zillow. All rights reserved.</p>
</footer>

<!-- Include your JavaScript files here -->
<!-- <script src="script.js"></script> -->

</body>
</html>
