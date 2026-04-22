<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Admin Dashboard</span>
        <a href="../logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="container mt-5">
    <div class="row text-center">

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h4>Manage Doctors</h4>
                <a href="doctor.php" class="btn btn-primary mt-2">Doctor Module</a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h4>Manage Diseases</h4>
                <a href="disease.php" class="btn btn-success mt-2">Disease Module</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>
