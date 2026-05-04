<?php

class DatabaseManager
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "practice";

    public function openConnection()
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "practice";

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($connection->connect_error) {
            die("Please connection the database" . $connection->connect_error);
        }
        return $connection;
    }

    public function registerUser($conn, $table, $name, $email, $password)
    {
        $query = "INSERT INTO $table (name, email, password) VALUES ('$name', '$email', '$password')";
        return $conn->query($query);
    }

    public function authenticateUser($conn, $table, $email, $password)
    {
        $query = "SELECT * FROM $table WHERE email = '$email' AND password = '$password'";
        return $conn->query($query);
    }

    public function fetchUserData($conn, $table, $email)
    {
        $query = "SELECT * FROM $table WHERE email = '$email'";
        return $conn->query($query);
    }
}
?>