<?php
/*
 * Developed by: Fuad Hasan
 * Email: fuad@zyntro360.com
 * Lab 3 - Database Connection Task
 */

class DatabaseManager
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "practice";

    public function openConnection()
    {
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        
        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }
        return $conn;
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