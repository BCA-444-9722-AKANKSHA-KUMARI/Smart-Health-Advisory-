<?php
session_start();
include '../db/config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $symptoms = $_POST['symptoms'];
    $precautions = $_POST['precautions'];

    mysqli_query(
        $conn,
        "INSERT INTO diseases (disease_name, symptoms, precautions)
         VALUES ('$name','$symptoms','$precautions')"
    );
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Disease Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Add Disease</h3>

<form method="post" class="mb-4">
    <input type="text" name="name" class="form-control mb-2" placeholder="Disease Name" required>
    <textarea name="symptoms" class="form-control mb-2" placeholder="Symptoms (comma separated)" required></textarea>
    <textarea name="precautions" class="form-control mb-2" placeholder="Precautions" required></textarea>
    <button name="add" class="btn btn-success">Add Disease</button>
</form>

<h4>Disease List</h4>

<table class="table table-bordered">
    <tr>
        <th>Disease</th>
        <th>Symptoms</th>
        <th>Precautions</th>
    </tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM diseases");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['disease_name']}</td>
            <td>{$row['symptoms']}</td>
            <td>{$row['precautions']}</td>
          </tr>";
}
?>
</table>

<a href="dashboard.php" class="btn btn-secondary">Back</a>

</body>
</html>
