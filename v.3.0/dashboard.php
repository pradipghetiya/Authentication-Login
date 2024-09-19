<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo "Welcome, " . $_SESSION['user_name'] . "!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p>This is a protected page.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
<?php
session_start();
session_destroy();
header("Location: login.php");
exit;
?>
