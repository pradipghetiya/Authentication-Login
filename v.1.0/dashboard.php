<?php
session_start();

if (is_null($_SESSION["name"])) {
    header("Location:login.php");
    exit;
}

$profilePhoto = "/image/1.jpg";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }
        .profile-section {
            position: relative;
            display: inline-block;
            
            cursor: pointer;
        }
        .profile-section img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .profile-section .profile-name {
            font-size: 20px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }
        .dropdown-content a, .dropdown-content button {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 16px;
            background-color: transparent;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }
        .dropdown-content a:hover, .dropdown-content button:hover {
            background-color: #ddd;
        }
        .profile-section:hover .dropdown-content {
            display: block;
        }
        .navbar button {
            background-color: #ff4d4d;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .navbar button:hover {
            background-color: #e60000;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        .welcome-message {
            text-align: right;
        }
        .welcome-message h1 {
            color: #333;
            font-size: 36px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="profile-section">
            <img src="<?php echo $profilePhoto; ?>" alt="Profile Photo">

            <div class="profile-name">Welcome, <?php echo $_SESSION["name"]; ?></div>

            <!-- Dropdown content -->
            <div class="dropdown-content">
                <a href="profile.php">View Profile</a> <!-- Profile page link -->
                <form action="login.php" method="post">
                
                    <button type="submit" name="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="welcome-message">
            <h1>Welcome to your Dashboard, <?php echo $_SESSION["name"]; ?>!</h1>
        </div>
    </div>
</body>
</html>

<?php 
if (isset($_POST["submit"])) {
    session_destroy();
    header("Location:login.php");
    exit;
}
?>
