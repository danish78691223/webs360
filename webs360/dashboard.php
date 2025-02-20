<?php
// Ensure session is started only once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}

// Capture business_type safely
$business_type = isset($_SESSION['business_type']) ? $_SESSION['business_type'] : 'Unknown';

// Debug Info (for development only, remove in production)
//echo "<h4>Debug Info:</h4>";
//echo "Business Type: " . htmlspecialchars($business_type) . "<br>";
//echo "Session Data: ";
//print_r($_SESSION);
?>
<?php
// Ensure session is started only once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}

// Capture business_type safely
$business_type = isset($_SESSION['business_type']) ? $_SESSION['business_type'] : 'Unknown';

// User details
$user_name = htmlspecialchars($_SESSION['user_name']);
$role = htmlspecialchars($_SESSION['role']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo ucfirst($business_type); ?> Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
</head>

<body class="bg-light">
    <!-- Header Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WEB'S 360</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_product.php">Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="manage_orders.php">Manage Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="view_analytics.php">View Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="inventory.php">Inventory Management</a></li>
                </ul>
                <div class="d-flex">
                    <a href="index.php" class="btn btn-outline-light me-2">Home</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Business Information -->
        <div class="alert alert-info" role="alert">
            <h4>Welcome, <?php echo $user_name; ?>!</h4>
            <p>Role: <?php echo $role; ?></p>
            <p>Business Type: <?php echo ucfirst($business_type); ?></p>
        </div>

        <!-- Dashboard Overview -->
        <h2 class="text-center mb-4"><?php echo ucfirst($business_type); ?> Dashboard</h2>

        <!-- Quick Actions -->
        <div class="row g-4">
            <div class="col-md-3">
                <a href="add_product.php" class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Add Product</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="manage_orders.php" class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Manage Orders</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="view_analytics.php" class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">View Analytics</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="inventory.php" class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Inventory Management</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
