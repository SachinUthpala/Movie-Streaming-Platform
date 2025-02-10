<?php

// db connection
require '../../../Configs/db.config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userMail = isset($_POST['userMail']) ? filter_var($_POST['userMail'], FILTER_SANITIZE_EMAIL) : null;
    $userPassword = isset($_POST['userPassword']) ? $_POST['userPassword'] : null;

    if ($userMail && $userPassword) {
        try {
            // Prepare SQL statement to fetch user
            $sql = "SELECT AdminPassword FROM `admins` WHERE AdminMail = :AdminMail";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':AdminMail', $userMail, PDO::PARAM_STR);
            $stmt->execute();

            // Fetch user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($userPassword, $user['AdminPassword'])) {
                echo "Login successful!";
                // You can start a session here and redirect the user if needed.
                // session_start();
                $_SESSION['admin'] = $userMail;
                $_SESSION['login_Sucess'] = 1;
                header("Location: ../dashboard.php");
            } else {
                echo "Invalid email or password.";
                $_SESSION['login_Sucess'] = 0;
                header("Location: ../sign-in.php");
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "All fields are required.";
    }
}
