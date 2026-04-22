<?php
session_start();
include '../db/config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $spec = $_POST['spec'];
    $avail = $_POST['avail'];

    mysqli_query(
        $conn,
        "INSERT INTO doctors (name, specialization, availability)
         VALUES ('$name','$spec','$avail')"
    );
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Add Doctor</h3>

<form method="post" class="mb-4">
    <input type="text" name="name" class="form-control mb-2" placeholder="Doctor Name" required>
    <input type="text" name="spec" class="form-control mb-2" placeholder="Specialization" required>
    <input type="text" name="avail" class="form-control mb-2" placeholder="Availability" required>
    <button name="add" class="btn btn-primary">Add Doctor</button>
</form>

<h4>Doctor List</h4>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Specialization</th>
        <th>Availability</th>
    </tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM doctors");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['specialization']}</td>
            <td>{$row['availability']}</td>
          </tr>";
}
?>
</table>

<a href="dashboard.php" class="btn btn-secondary">Back</a>

</body>
</html>
