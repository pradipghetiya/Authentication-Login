<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
        <p>You have successfully logged in.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>


<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>