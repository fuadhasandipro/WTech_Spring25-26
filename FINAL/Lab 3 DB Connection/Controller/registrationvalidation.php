<?php
/*
 * Developed by: Fuad Hasan
 * Email: fuad@zyntro360.com
 */

require_once "../Model/db.php";
session_start();

$fileName = "data.json";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = trim($_POST["name"]);
    $userEmail = trim($_POST["email"]);
    $userPass = $_POST["password"];

    // Validation logic refactored
    $isValid = true;
    
    if (empty($userName) || strlen($userName) < 4) {
        $isValid = false;
        echo "Error: Name must be at least 4 characters.<br>";
    }

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        echo "Error: Invalid email format.<br>";
    }

    if (empty($userPass) || strlen($userPass) < 6) {
        $isValid = false;
        echo "Error: Password must be at least 6 characters.<br>";
    }

    if ($isValid) {
        $_SESSION["name"] = $userName;
        $_SESSION["email"] = $userEmail;
        
        setcookie("user_name", $userName, time() + 3600, "/");
        setcookie("user_email", $userEmail, time() + 3600, "/");

        // JSON handling
        $newUser = [
            "name" => $userName,
            "email" => $userEmail,
            "password" => $userPass
        ];

        $currentData = [];
        if (file_exists($fileName)) {
            $jsonContent = file_get_contents($fileName);
            $currentData = json_decode($jsonContent, true) ?? [];
        }

        $currentData[] = $newUser;
        file_put_contents($fileName, json_encode($currentData, JSON_PRETTY_PRINT));

        // Database logic
        $db = new DatabaseManager();
        $conn = $db->openConnection();
        $isRegistered = $db->registerUser($conn, "users", $userName, $userEmail, $userPass);

        if ($isRegistered) {
            header("Location: ../View/login.php");
            exit();
        } else {
            echo "Registration failed in database. Please try again.";
        }
    }
}
?>