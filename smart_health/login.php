<?php
session_start();
include 'db/config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email='$email' AND password='$password'"
    );

    if (mysqli_num_rows($query) == 1) {
        $_SESSION['user'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow p-4">
                <h3 class="text-center mb-3">User Login</h3>

                <?php
                if (isset($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                ?>

                <form method="post">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                    <button type="submit" name="login" class="btn btn-primary w-100">
                        Login
                    </button>
                </form>

                <p class="mt-3 text-center">
                    New user?
                    <a href="register.php">Register here</a>
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
