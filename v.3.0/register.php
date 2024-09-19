<?php
require_once 'connect.php';
require_once 'user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->name = htmlspecialchars($_POST['name']);
    $user->email = htmlspecialchars($_POST['email']);
    $user->mobile = htmlspecialchars($_POST['mobile']);
    $user->password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($user->password !== $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        $user->password = password_hash($user->password, PASSWORD_BCRYPT);
        if ($user->register()) {
            echo "<script>alert('Registration successful!');</script>";
            header("Location: login.php");
        } else {
            echo "Registration failed.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555555;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: #ffffff;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" name="confirmPassword" required><br>

            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
