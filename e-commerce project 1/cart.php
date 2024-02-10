<?php
session_start();
include_once 'php/conexion.php';

function savePurchaseToDatabase($productName, $productPrice) {
    global $conexion; 
    
    
    $username = $_SESSION['username'];
    
    // Insert the purchase into the database
    $query = "INSERT INTO userhistory (username, product_name, price) VALUES ('$username', '$productName', '$productPrice')";
    
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
}

// Check if the confirm purchase button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_purchase"])) {
    // Loop through each cart item and save it to the database
    foreach ($_SESSION['cart'] as $cartItem) {
        $productName = $cartItem['name'];
        $productPrice = $cartItem['price'];
        savePurchaseToDatabase($productName, $productPrice);
    }

    // Clear the cart after confirming purchase
    $_SESSION['cart'] = array();
    
    // Set a flag to show the purchase confirmation message
    $purchaseConfirmed = true;
}

// Check if the delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_index"])) {
    $deleteIndex = $_POST["delete_index"];
    if (isset($_SESSION['cart'][$deleteIndex])) {
        unset($_SESSION['cart'][$deleteIndex]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart - LedTec</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <div class="container">
    <a class="navbar-brand" href="#">LedTec</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fas fa-info-circle me-1"></i>About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php"><i class="fas fa-box me-1"></i>Products</a>
        </li>
        <?php
        if (isset($_SESSION['username'])) {
          echo '<li class="nav-item">';
          echo '<span class="nav-link">Welcome, ' . $_SESSION['username'] . '!</span>';
          echo '</li>';
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart me-1"></i>Cart</a>';
          echo '</li>';
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="php/logout.php"><i class="fas fa-sign-out-alt me-1"></i>Sign Out</a>';
          echo '</li>';
        } else {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="signup.php"><i class="fas fa-user-plus me-1"></i>Sign Up</a>';
          echo '</li>';
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-1"></i>Log In</a>';
          echo '</li>';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

<section id="cart" class="py-5 bg-light shadow-sm">
  <div class="container">
    <h2 class="text-center mb-4">Shopping Cart</h2>
    <div class="row">
      
      <?php
      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $index => $cartItem) {
          echo '<div class="col-lg-4 mb-4">';
          echo '<div class="card h-100">';
          echo '<img src="' . $cartItem['image'] . '" class="card-img-top" alt="' . $cartItem['name'] . '">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $cartItem['name'] . '</h5>';
          echo '<p class="card-text">Price: $' . $cartItem['price'] . '</p>';
          echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
          echo '<input type="hidden" name="delete_index" value="' . $index . '">';
          echo '<button type="submit" class="btn btn-danger">Delete</button>';
          echo '</form>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<div class="col">';
        echo '<p class="text-center">Your cart is empty.</p>';
        echo '</div>';
      }
      ?>
    </div>
    <div class="message-container" style="min-height: 50px;">
        <?php if (isset($purchaseConfirmed) && $purchaseConfirmed): ?>
            <div class="alert alert-success text-center" role="alert">
                Purchase confirmed and cart cleared successfully!
            </div>
        <?php endif; ?>
    </div>
    <div class="row mt-4">
      <div class="col text-center">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <button type="submit" class="btn btn-primary" name="confirm_purchase">Confirm Purchase</button>
        </form>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col text-center">
        <?php
        $totalPrice = 0;
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $cartItem) {
            $totalPrice += $cartItem['price'];
          }
        }
        echo '<p>Total Price: $' . $totalPrice . '</p>';
        ?>
      </div>
    </div>
  </div>
</section>

<footer class="bg-dark text-light text-center py-3">
  <div class="container">
    &copy; Joaquin Ledezma 2024
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
