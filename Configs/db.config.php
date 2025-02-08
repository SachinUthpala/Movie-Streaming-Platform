<?php
$ServerName = "localhost";
$UserName = "root";
$Password = "";
$DbName = "moviehub";

try {
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$ServerName;dbname=$DbName;charset=utf8", $UserName, $Password);

    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Uncomment to verify connection
    // echo "Connected successfully"; 
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
