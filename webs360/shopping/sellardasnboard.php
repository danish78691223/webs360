<?php
// seller_dashboard.php
session_start();

// Check if seller is logged in (dummy authentication for now)
if (!isset($_SESSION['seller_id'])) {
    header('Location: seller_login.php');
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', '../db.php');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$seller_id = $_SESSION['seller_id'];

// Fetch seller details
$seller_query = $conn->prepare("SELECT business_name, email, phone, category FROM sellers WHERE id = ?");
$seller_query->bind_param("i", $seller_id);
$seller_query->execute();
$seller = $seller_query->get_result()->fetch_assoc();
$seller_query->close();

// Fetch products for the seller
$product_query = $conn->prepare("SELECT id, product_name, price, stock FROM products WHERE seller_id = ?");
$product_query->bind_param("i", $seller_id);
$product_query->execute();
$products = $product_query->get_result();
$product_query->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo htmlspecialchars($seller['business_name']); ?>!</h1>

        <div class="seller-info">
            <p><strong>Email:</strong> <?php echo htmlspecialchars($seller['email']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($seller['phone']); ?></p>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($seller['category']); ?></p>
        </div>

        <h2>Your Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product = $products->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                        <td>$<?php echo htmlspecialchars($product['price']); ?></td>
                        <td><?php echo htmlspecialchars($product['stock']); ?></td>
                        <td><a href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a> | <a href="delete_product.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="add_product.php" class="btn">Add New Product</a>
        <a href="logout.php" class="btn logout">Logout</a>
    </div>
</body>
</html>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.dashboard-container {
    width: 90%;
    max-width: 1000px;
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.seller-info p {
    margin: 5px 0;
}
.btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
.btn.logout {
    background: #f44336;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}
th {
    background: #4CAF50;
    color: white;
}
a {
    color: #4CAF50;
}
</style>
