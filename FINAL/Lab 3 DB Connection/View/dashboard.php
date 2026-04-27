<?php
/*
 * Developed by: Fuad Hasan
 * Email: fuad@zyntro360.com
 */

require_once "../Model/db.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['email'];
$dbHandler = new DatabaseManager();
$conn = $dbHandler->openConnection();
$userData = $dbHandler->fetchUserData($conn, "users", $userEmail);

if ($userData && $userData->num_rows > 0) {
    $userRow = $userData->fetch_assoc();
    $displayName = $userRow['name'];
    $displayEmail = $userRow['email'];
    $displayPass = $userRow['password'];
} else {
    die("User data not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - <?php echo $displayName; ?></title>
</head>
<body style="padding: 30px; line-height: 1.6;">
    <h1>Welcome, <?php echo $displayName; ?>!</h1>
    <hr>
    <h3>Your Profile Details:</h3>
    <ul>
        <li><strong>Full Name:</strong> <?php echo $displayName; ?></li>
        <li><strong>Email Address:</strong> <?php echo $displayEmail; ?></li>
        <li><strong>Security Key (Pass):</strong> <?php echo $displayPass; ?></li>
    </ul>
    <br>
    <a href="login.php">Logout</a>
</body>
</html>