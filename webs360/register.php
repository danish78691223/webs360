<?php
session_start();
include 'db.php'; // Ensure this file connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate fields
    if (empty($name) || empty($email) || empty($password)) {
        echo "<script>alert('All fields are required!'); window.location.href = 'register.php';</script>";
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email already exists! Try logging in.'); window.location.href = 'register.php';</script>";
        exit();
    }
    $stmt->close();

    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database (without role)
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! You can now log in.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error in registration. Try again!');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="register-container">
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
    <p><a href="admin_register.php">Register Your Business </a></p>
</div>
 <div class="btn-top-left">
            <a href="login.php" class="btn-back">Back to Home</a>
        </div>
</body>
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
</html>
