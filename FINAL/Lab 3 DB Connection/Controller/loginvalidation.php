<?php
/*
 * Developed by: Fuad Hasan
 * Email: fuad@zyntro360.com
 */

require_once "../Model/db.php";
session_start();

$jsonFile = "data.json";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailInput = trim($_POST["email"]);
    $passInput = $_POST["password"];

    if (filter_var($emailInput, FILTER_VALIDATE_EMAIL) && strlen($passInput) >= 6) {
        $_SESSION["email"] = $emailInput;
        setcookie("last_login_email", $emailInput, time() + (86400 * 30), "/");

        // Log entry in JSON (simplified and refactored)
        $loginLog = [
            "email" => $emailInput,
            "timestamp" => date("Y-m-d H:i:s")
        ];

        $logs = [];
        if (file_exists($jsonFile)) {
            $logs = json_decode(file_get_contents($jsonFile), true) ?? [];
        }
        $logs[] = $loginLog;
        file_put_contents($jsonFile, json_encode($logs, JSON_PRETTY_PRINT));

        // DB Authentication
        $dbManager = new DatabaseManager();
        $dbConn = $dbManager->openConnection();
        $authResult = $dbManager->authenticateUser($dbConn, "users", $emailInput, $passInput);

        if ($authResult && $authResult->num_rows > 0) {
            header("Location: ../View/dashboard.php");
            exit();
        } else {
            echo "Invalid credentials. Please verify your email and password.";
        }
    } else {
        echo "Please provide valid login details.";
    }
}
?>