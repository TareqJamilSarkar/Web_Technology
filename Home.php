<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <style>
        .home-container { max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 12px; text-align: center; }
        .home-title { color: #007bff; }
        .home-links { margin-top: 25px; }
        .home-links a { margin: 0 10px; color: #007bff; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="home-container">
        <h1 class="home-title">Welcome<?php if (isset($_SESSION["admin_name"])) echo ', ' . htmlspecialchars($_SESSION["admin_name"]); ?>!</h1>
        <p>You are logged in to the Event Management System.</p>
        <div class="home-links">
            <a href="Admin_Home.php">Admin Panel</a> | 
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>