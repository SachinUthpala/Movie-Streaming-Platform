<?php

// db connection
require '../../../Configs/db.config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userMail = isset($_POST['userMail']) ? filter_var($_POST['userMail'], FILTER_SANITIZE_EMAIL) : null;
    $userPassword = isset($_POST['userPassword']) ? $_POST['userPassword'] : null;

    if ($userMail && $userPassword) {
        try {
            // Hash password securely
            $hashPassword = password_hash($userPassword, PASSWORD_BCRYPT);

            // Prepare SQL statement
            $sql = "INSERT INTO `admins` (`AdminMail`, `AdminPassword`) VALUES (:AdminMail, :AdminPassword)";
            $stmt = $conn->prepare($sql);

            // Bind parameters and execute
            $stmt->bindParam(':AdminMail', $userMail, PDO::PARAM_STR);
            $stmt->bindParam(':AdminPassword', $hashPassword, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "Admin registered successfully!";
            } else {
                echo "Error: Could not register admin.";
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "All fields are required.";
    }
}
