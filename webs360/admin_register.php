<?php
include 'db.php'; // Includes database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $address = $_POST['address'];
    $business_type = $_POST['business_type'];
    $password = $_POST['password'];

    // If "Other" is selected, use the entered value
    if ($business_type == "Other") {
        $business_type = $_POST['other_business'];
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM admins WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Email already exists. Please use a different email.'); window.location.href='admin_register.php';</script>";
    } else {
        // Hash password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert new admin
        $insert_query = "INSERT INTO admins (full_name, email, mobile_no, address, business_type, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ssssss", $full_name, $email, $mobile_no, $address, $business_type, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Admin registered successfully! Redirecting to login...'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration | WEB'S 360</title>
    <link rel="stylesheet" href="admin_register.css">
    <script defer src="admin_register.js"></script>
</head>
<body>
    <div class="container">
        <h2>Business Registration</h2>
        <form action="admin_register.php" method="POST">
            <label>Full Name:</label>
            <input type="text" name="full_name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Mobile No.:</label>
            <input type="text" name="mobile_no" required pattern="[0-9]{10}" title="Enter a valid 10-digit mobile number">

            <label>Address:</label>
            <textarea name="address" required></textarea>

            <label>Type of Business:</label>
            <select name="business_type" id="businessType" required>
                <option value="E-commerce">E-commerce</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="Retail">Retail</option>
                <option value="IT Services">IT Services</option>
                <option value="Other">Other</option>
            </select>

            <div id="otherBusinessDiv" style="display: none;">
                <label>Specify Business Type:</label>
                <input type="text" name="other_business" id="otherBusiness">
            </div>

            <label>Password:</label>
            <input type="password" name="password" required minlength="6">

            <button type="submit">Register</button>
        </form>
        <div class="btn-top-left">
            <a href="register.php" class="btn-back">Back to Home</a>
        </div>
    </div>
    <style>
        .btn-back {
            display: inline-block;
            margin-top: 40px;
            padding: 12px 24px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: linear-gradient(135deg, #0072ff, #00c6ff);
            transform: scale(1.1);
        }

        .btn-top-left {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>

</body>
</html>
