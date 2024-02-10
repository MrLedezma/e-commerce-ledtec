<?php
session_start();

// Function to add a product to the cart
function addToCart($name, $price, $image) {
    $product = array(
        'name' => $name,
        'price' => $price,
        'image' => $image
    );
    $_SESSION['cart'][] = $product;
}

// Add products to the cart when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product"]) && isset($_POST["price"]) && isset($_POST["image"])) {
        $productName = $_POST["product"];
        $productPrice = $_POST["price"];
        $productImage = $_POST["image"];
        addToCart($productName, $productPrice, $productImage);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products - LedTec</title>
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
          // User is logged in
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
          // User is not logged in
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

<section id="products" class="py-5 bg-light shadow-sm">
  <div class="container">
    <h2 class="text-center mb-4">Products</h2>
    <div class="row">
      <div class="col-lg-4 mb-4">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="card h-100">
            <img src="img/ps5.jpg" class="card-img-top" alt="PlayStation 5">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">PlayStation 5</h5>
              <p class="card-text">Price: $400</p>
              <input type="hidden" name="product" value="PlayStation 5">
              <input type="hidden" name="price" value="400">
              <input type="hidden" name="image" value="img/ps5.jpg">
              <button type="submit" class="btn btn-primary mt-auto align-self-center">Add to Cart</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-4 mb-4">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="card h-100">
            <img src="img/xboxone.jpg" class="card-img-top" alt="Xbox One">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Xbox One</h5>
              <p class="card-text">Price: $300</p>
              <input type="hidden" name="product" value="Xbox One">
              <input type="hidden" name="price" value="300">
              <input type="hidden" name="image" value="img/xboxone.jpg">
              <button type="submit" class="btn btn-primary mt-auto align-self-center">Add to Cart</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-4 mb-4">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="card h-100">
            <img src="img/nintendoswitch.jpg" class="card-img-top" alt="Nintendo Switch">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Nintendo Switch</h5>
              <p class="card-text">Price: $200</p>
              <input type="hidden" name="product" value="Nintendo Switch">
              <input type="hidden" name="price" value="200">
              <input type="hidden" name="image" value="img/nintendoswitch.jpg">
              <button type="submit" class="btn btn-primary mt-auto align-self-center">Add to Cart</button>
            </div>
          </div>
        </form>
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





