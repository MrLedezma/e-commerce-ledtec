<?php
include_once "./conexion.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute a query to fetch user data based on username
    $stmt = $conexion->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // Fetch the user row
        $row = $result->fetch_assoc();
        
       
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: ../index.php");
            exit(); 
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "User does not exist. Please try again.";
    }

    $stmt->close();
}
?>



