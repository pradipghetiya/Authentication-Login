<?php
session_start();
require 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $database = new Database();
    $db = $database->getConnection();

    try {
        $query = "SELECT * FROM register WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                echo "<script>alert('Login successful! Redirecting to the dashboard.');</script>";
                echo "<script>window.location.href='dashboard.php';</script>";
                exit();
            } else {
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Email not found. Please register first.');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" name="login" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
