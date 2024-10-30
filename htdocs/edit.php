<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login/login.php');
    exit;
}

$car_id = '';
$name = '';
$address = '';
$phone = '';
$email = '';
$added_by = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM car_rent WHERE car_id = ?");
    $stmt->execute([$id]);
    $restaurant = $stmt->fetch();

    $car_id = $restaurant['car_id'];
    $name = $restaurant['name'];
    $address = $restaurant['address'];
    $phone = $restaurant['phone_number'];
    $email = $restaurant['email'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if ($car_id) {
        // Update existing restaurant
        $stmt = $pdo->prepare("UPDATE car_rent SET name = ?, address = ?, phone_number = ?, email = ? WHERE car_id = ?");
        $stmt->execute([$name, $address, $phone, $email, $car_id]);
    } else {
        // Add new restaurant
        $stmt = $pdo->prepare("INSERT INTO car_rent (name, address, phone_number, email, added_by, last_updated) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $address, $phone, $email, $added_by]);
    }

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $car_id ? 'Edit' : 'Add'; ?> Car Rental System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1><?php echo $car_id ? 'Edit' : 'Add'; ?> Car</h1>

    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
