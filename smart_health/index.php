<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Health Advisory System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Smart Health</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/admin_login.php">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="mb-3">Smart Health Advisory System</h1>
            <p class="lead">
                A web-based system that provides basic disease prediction based on symptoms
                and helps users find suitable doctors easily.
            </p>
            <a href="register.php" class="btn btn-success btn-lg">Get Started</a>
        </div>
        <div class="col-md-6 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/2966/2966487.png"
                 alt="Health"
                 class="img-fluid"
                 width="300">
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="container mt-5">
    <div class="row text-center">
        <h2 class="mb-4">Key Features</h2>

        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4>Disease Prediction</h4>
                <p>Predict possible diseases based on selected symptoms.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4>Doctor Management</h4>
                <p>Find doctors according to disease specialization.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4>Secure System</h4>
                <p>User and admin authentication using PHP sessions.</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center mt-5 p-3">
    <p class="mb-0">
        © <?php echo date("Y"); ?> Smart Health Advisory System  
        | BCA Final Year Project
    </p>
</footer>

</body>
</html>
