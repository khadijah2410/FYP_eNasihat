<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu Template</title>
    <style>
        /* CSS for the sidebar menu */
        body {
            margin: 0;
            padding: 0;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #f0f0f0;
            padding: 20px;
        }
        
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar li {
            margin-bottom: 10px;
        }
        
        .sidebar a {
            display: block;
            text-decoration: none;
            color: #333;
            padding: 5px;
            border-radius: 5px;
        }
        
        .sidebar a:hover {
            background-color: #ccc;
        }
        
        /* CSS for the content area */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>

    <!-- Content area -->
    <div class="content">
        <h1>Welcome to the Sidebar Menu Template!</h1>
        <p>This is the content area of your page.</p>
    </div>
</body>
</html>
