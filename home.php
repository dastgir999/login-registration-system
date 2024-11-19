<?php
session_start();
include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.html'); // Redirect to login page if not logged in
    exit;
}

// Get user data from the session
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .profile {
            text-align: center;
        }
        .profile img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
        .profile h2 {
            margin: 10px 0;
        }
        .profile p {
            color: #666;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons a {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 20px;
            background: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .buttons a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile">
        <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
        <img src="uploads/<?php echo htmlspecialchars($user['profile_image']); ?>" alt="Profile Image">
        <h2><?php echo htmlspecialchars($user['username']); ?></h2>
        <p><?php echo htmlspecialchars($user['email']); ?></p>

        <div class="buttons">
            <a href="update_profile.php">Update Profile</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
</body>
</html>

