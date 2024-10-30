<?php
require 'db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /login/login.php");
    exit;
}

// Fetch all cars from the database
$stmt = $pdo->query("
    SELECT car_rent.*, users.username
    FROM car_rent 
    JOIN users ON car_rent.added_by = users.id
"); // Adjust the query if your table name is different
$cars = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h1>Car Rental System</h1>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <a href="edit.php" class="btn btn-primary mb-4">Add New Car</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Added By</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?php echo $car['car_id']; ?></td>
                    <td><?php echo $car['name']; ?></td>
                    <td><?php echo $car['address']; ?></td>
                    <td><?php echo $car['phone_number']; ?></td>
                    <td><?php echo $car['email']; ?></td>
                    <td><?php echo $car['username']; ?></td>
                    <td><?php echo $car['last_updated']; ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $car['car_id']; ?>" class="btn btn-info">View</a>
                        <a href="edit.php?id=<?php echo $car['car_id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $car['car_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
