<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
    exit(0);
}


?>