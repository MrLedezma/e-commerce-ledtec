<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - LedTec</title>
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
        <li class="nav-item">
          <a class="nav-link" href="signup.php"><i class="fas fa-user-plus me-1"></i>Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-1"></i>Log In</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

      <section id="signup" class="py-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title text-center mb-4">Sign Up</h2>
                  <form action="php/signup2.php" method="POST"> 
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                  </form>
                </div>
              </div>
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
