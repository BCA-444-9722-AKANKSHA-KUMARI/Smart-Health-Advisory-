<?php
session_start();
include 'db/config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_POST['symptoms'])) {
    echo "<script>alert('Please select symptoms'); window.location='dashboard.php';</script>";
    exit();
}

$userSymptoms = $_POST['symptoms'];
$bestMatch = 0;
$predictedDisease = null;

$diseases = mysqli_query($conn, "SELECT * FROM diseases");

while ($row = mysqli_fetch_assoc($diseases)) {
    $dbSymptoms = explode(",", $row['symptoms']);
    $match = count(array_intersect($userSymptoms, $dbSymptoms));

    if ($match > $bestMatch) {
        $bestMatch = $match;
        $predictedDisease = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prediction Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container mt-5">

<?php if ($predictedDisease): ?>

    <div class="card shadow p-4">
        <h3 class="text-success">
            Possible Disease: <?php echo $predictedDisease['disease_name']; ?>
        </h3>

        <p><strong>Precautions:</strong></p>
        <p><?php echo $predictedDisease['precautions']; ?></p>

        <hr>

        <h5>Recommended Doctors</h5>

        <?php
        $spec = $predictedDisease['disease_name'];
        $docs = mysqli_query(
            $conn,
            "SELECT * FROM doctors WHERE specialization LIKE '%$spec%'"
        );

        if (mysqli_num_rows($docs) > 0) {
            while ($doc = mysqli_fetch_assoc($docs)) {
                echo "<div class='card p-2 mb-2'>
                        <strong>{$doc['name']}</strong><br>
                        Specialization: {$doc['specialization']}<br>
                        Available: {$doc['availability']}
                      </div>";
            }
        } else {
            echo "<p>No doctor available currently.</p>";
        }
        ?>
    </div>

<?php else: ?>
    <div class="alert alert-warning">
        No disease matched your symptoms.
    </div>
<?php endif; ?>

<a href="dashboard.php" class="btn btn-primary mt-3">Back</a>

</div>

</body>
</html>
