<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            color: #333;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
            width: 93%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .login-link {
            text-align: center;
            margin-top: 10px;
        }
        .login-link a {
            color: #007bff;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function validateForm() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return false;
            }
            else if(password <= 8) {
                alert('atleast 8 letter password');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="register.php" method="post" onsubmit="return validateForm()">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile">Mobile Number</label>
            <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" placeholder="Enter 10-digit number" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" required>

            <button type="submit">Register</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
<?php
require 'connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Hash the password for security
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM register WHERE email = '$email'";

    $result = mysqli_query($conn, $sql); 
    // SQL query to insert data
    if (mysqli_num_rows($result) === 0) {
        $sql = "INSERT INTO register (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        header('Location: '.'login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    else    {
        echo "already exist";
    }
}
?> 