<?php
include "../Model/db.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nameErr = $emailErr = $genderErr = $websiteErr = $passwordErr = $fileErr = "";
$name = $email = $gender = $comment = $website = $password = $filepath = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = false;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $hasError = true;
    } else {
        $name = test_input($_POST["name"]);
        if (strlen($name) < 5) {
            $nameErr = "Name must be at least 5 characters";
            $hasError = true;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $hasError = true;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $hasError = true;
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $hasError = true;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $hasError = true;
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 4) {
            $passwordErr = "Password must be at least 4 characters";
            $hasError = true;
        }
    }

    // File upload
    $file = $_FILES["file"] ?? null;
    $path = "";
    if ($file && $file["error"] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
        if (!in_array($file["type"], $allowedTypes)) {
            $fileErr = "Only JPG, JPEG, PNG & GIF files are allowed";
            $hasError = true;
        } else {
            $targetdirectory = "../File/";
            if (!is_dir($targetdirectory)) {
                mkdir($targetdirectory, 0777, true);
            }
            $path = $targetdirectory . basename($file["name"]);
            if(!move_uploaded_file($file["tmp_name"], $path)) {
                 $fileErr = "Failed to upload file";
                 $hasError = true;
            }
        }
    }

    if (!$hasError) {
        setcookie("UserName", $name, time() + 3600, "/");

        $formdata = array(
            "name" => $name,
            "email" => $email,
            "website" => $website,
            "comment" => $comment,
            "gender" => $gender,
            "password" => $password
        );

        $datafile = "../data.json";
        $tempdata = array();
        if (file_exists($datafile)) {
            $existdata = file_get_contents($datafile);
            $tempdata = json_decode($existdata, true);
            if (!is_array($tempdata)) {
                $tempdata = array();
            }
        }

        $tempdata[] = $formdata;
        $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
        file_put_contents($datafile, $jsondata);

        $database = new db();
        $connection = $database->connection();
        $result = $database->signup($connection, "users", $name, $email, $website, $comment, $gender, $password, $path);
        
        if ($result) {
            header("Location: ../View/Login.php");
            exit();
        } else {
            echo "Database error during registration.";
        }
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
