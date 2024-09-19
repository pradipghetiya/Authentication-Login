<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    
    $database = new Database();
    $db = $database->getConnection();

    try {
        $query = "INSERT INTO register (name, email, mobile, password) VALUES (:name, :email, :mobile, :password)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!');</script>";
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" id="mobile" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
