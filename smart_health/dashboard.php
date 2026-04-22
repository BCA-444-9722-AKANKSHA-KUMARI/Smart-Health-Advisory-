<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">Smart Health Dashboard</span>
        <a href="logout.php" class="btn btn-danger"
           onclick="return confirm('Logout?');">Logout</a>
    </div>
</nav>

<div class="container mt-4">
    <h4>Select Your Symptoms</h4>

    <form method="post" action="predict.php" class="mt-3">

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="symptoms[]" value="fever">
            <label class="form-check-label">Fever</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="symptoms[]" value="cough">
            <label class="form-check-label">Cough</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="symptoms[]" value="headache">
            <label class="form-check-label">Headache</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="symptoms[]" value="fatigue">
            <label class="form-check-label">Fatigue</label>
        </div>

        <button class="btn btn-success mt-3">
            Predict Disease
        </button>
    </form>
</div>

</body>
</html>
