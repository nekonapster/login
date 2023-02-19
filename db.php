<?php
$server= "localhost";
$username= "profesor";
$pass= "";
$database= "dimarcodb";
$table= "usuarios"; 

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $pass);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

?>