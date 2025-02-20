<?php
// seller_register.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $business_name = htmlspecialchars($_POST['business_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $category = htmlspecialchars($_POST['category']);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', '../db.php');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO sellers (business_name, email, phone, category) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $business_name, $email, $phone, $category);

    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful!'); window.location.href='sellardasnboard.php';</script>";
    } else {
        echo "<script>alert('Registration Failed! Please try again.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Become a Seller</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
</head>
<body>
    <div class="seller-container">
        <h2>Become a Seller</h2>
        <form action="seller_register.php" method="POST" id="sellerForm" onsubmit="return validateForm()">
            <label>Business Name:</label>
            <input type="text" name="business_name" id="business_name" required>

            <label>Email Address:</label>
            <input type="email" name="email" id="email" required>

            <label>Phone Number:</label>
            <input type="text" name="phone" id="phone" required>

            <label>Product Category:</label>
            <select name="category" id="category" required>
                <option value="">Select Category</option>
                <option value="Electronics">Electronics</option>
                <option value="Fashion">Fashion</option>
                <option value="Home & Living">Home & Living</option>
                <option value="Health & Beauty">Health & Beauty</option>
                <option value="Other">Other</option>
            </select>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
<!-- style.css -->
<style>
body {
    font-family: Arial, sans-serif;
    background: #f9f9f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.seller-container {
    background: #fff;
    padding: 40px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    border-radius: 12px;
    width: 100%;
    max-width: 500px;
}
label {
    display: block;
    margin: 10px 0 5px;
}
input, select, button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
}
button {
    background: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}
button:hover {
    background: #45a049;
}
</style>
<!-- script.js -->
<script>
function validateForm() {
    const phone = document.getElementById('phone').value;
    if (!/^[0-9]{10}$/.test(phone)) {
        alert('Please enter a valid 10-digit phone number.');
        return false;
    }
    return true;
}
</script>


</html>
