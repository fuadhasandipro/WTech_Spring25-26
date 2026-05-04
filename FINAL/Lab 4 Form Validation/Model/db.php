<?php

class db{
function connection()
{
$db_host = "localhost";
$db_user= "root";
$db_password="";
$db_name="form_validation"; 

$connection=  new mysqli($db_host, $db_user,$db_password,$db_name);
if($connection->connect_error)
    {
        die ("Could not Connect Database".$connection->connect_error);
    }
return $connection;
}

function signup($connection, $tablename, $name, $email, $website, $comment, $gender, $password, $filepath)
{
    $sql= "INSERT INTO " .$tablename. "(name, email, website, comment, gender, password, filepath) VALUES ('".$name."', '".$email."', '".$website."', '".$comment."', '".$gender."', '".$password."','".$filepath."')";
    $result = $connection->query($sql);
    return $result;
}

function signin($connection, $tablename, $email, $password)
{
    $sql = "SELECT * FROM ".$tablename." WHERE email='".$email."' AND password='".$password."'";
    $result = $connection->query($sql);
    return $result;
}
	
}

?>
