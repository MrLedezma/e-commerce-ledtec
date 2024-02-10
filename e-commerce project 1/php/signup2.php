<?php
include_once "./conexion.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute a query to insert user data into the database
    $stmt = $conexion->prepare("INSERT INTO users (username, password, email, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $hashedPassword, $email, $phone);

    if ($stmt->execute()) {
        header("Location: ../login.php");
        exit(); 
    } else {
        error_log("Error during user registration: " . $conexion->error);
        echo "Oops! Something went wrong. Please try again later.";
    }

    $stmt->close();
}
?>




