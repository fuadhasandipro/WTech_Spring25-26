<?php
include "../Model/db.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$emailErr = $passwordErr = $loginErr = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = false;

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $hasError = true;
    } else {
        $email = test_input_login($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $hasError = true;
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $hasError = true;
    } else {
        $password = test_input_login($_POST["password"]);
    }

    if (!$hasError) {
        $database = new db();
        $connection = $database->connection();
        $result = $database->signin($connection, "users", $email, $password);

        if ($result && $result->num_rows > 0) {
            $_SESSION["loggedIn"] = true;
            $row = $result->fetch_assoc();
            
            if ($row) {
                $_SESSION["UserName"] = $row["name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["website"] = $row["website"];
                $_SESSION["gender"] = $row["gender"];
                $_SESSION["comment"] = $row["comment"];
                if (isset($row["filepath"])) {
                    $_SESSION["filepath"] = $row["filepath"];
                }
            }
            header("Location: ../View/Dashboard.php");
            exit();
        } else {
            $loginErr = "Invalid Login Credentials";
        }
    }
}

function test_input_login($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
