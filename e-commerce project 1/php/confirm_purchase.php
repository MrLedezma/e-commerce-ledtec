<?php
session_start();
include_once "conexion.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page if not logged in
    header("Location: ../login.php");
    exit;
}


// Check if the user has items in their cart
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty. Please add some items before confirming your purchase.";
    exit;
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

$stmt = $conexion->prepare("INSERT INTO userhistory (user_id, product_name, price, purchase_date) VALUES (?, ?, ?, NOW())");

// Bind parameters and execute the statement for each item in the cart
foreach ($_SESSION['cart'] as $cartItem) {
    $product_name = $cartItem['name'];
    $price = $cartItem['price'];

    // Bind parameters and execute the statement
    $stmt->bind_param("iss", $user_id, $product_name, $price);
    $stmt->execute();
}

$stmt->close();

// Optionally, clear the cart after the purchase is confirmed
unset($_SESSION['cart']);

header("Location: purchase_confirmation.php");
exit;
?>
