<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LedTec</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        session_start();
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

<main>
  <section id="about" class="py-5 bg-light shadow">
    <div class="container">
      <h2 class="text-center mb-4">About Us</h2>
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h3>We sell gaming technology such as PlayStations, Xbox, and Nintendo Switch. LedTec is known for its history of business with tech...</h3>
        </div>
        <div class="col-lg-6">
          <img src="img/aboutus.png" alt="About Us Image" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <section id="why-choose" class="py-5 bg-light shadow">
    <div class="container">
      <h2 class="text-center mb-4">Why Choose Us</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <i class="fas fa-hand-holding-heart fa-3x mb-3"></i>
              <h5 class="card-title">Why Pick Us</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <i class="fas fa-lock fa-3x mb-3"></i>
              <h5 class="card-title">Safe Website</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <i class="fas fa-tools fa-3x mb-3"></i>
              <h5 class="card-title">Tech Support</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="bg-light shadow-sm">
    <div class="container py-5">
      <h2 class="text-center mb-4">Contact Us</h2>
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="map-container shadow">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.2344774231936!2d-103.35515178450068!3d20.673257486153437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428a8e99b0f4851%3A0x47261e5bcb8b2007!2sGuadalajara%2C%20Jalisco%2C%20Mexico!5e0!3m2!1sen!2s!4v1644152459974!5m2!1sen!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-info text-center p-4">
            <ul class="list-unstyled">
              <li><i class="fas fa-map-marker-alt me-2"></i>Guadalajara, Jalisco, Mexico</li>
              <li><i class="fas fa-envelope me-2"></i>info@example.com</li>
              <li><i class="fas fa-phone me-2"></i>+1234567890</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<footer class="bg-dark text-light text-center py-3">
  <div class="container">
    &copy; Joaquin Ledezma 2024
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

