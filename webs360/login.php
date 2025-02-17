<?php
session_start();
include 'db.php';  // Ensure db.php is correctly included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check in 'users' table
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found in 'users' table
        $stmt->bind_result($id, $user_name, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {  
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['role'] = "user";  // Set role as user

            header("Location: index.php");  // Redirect to user dashboard
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='login.php';</script>";
            exit();
        }
    }
    $stmt->close();

    // If not found in users, check in 'admins' table
    $stmt = $conn->prepare("SELECT id, full_name, password FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found in 'admins' table
        $stmt->bind_result($id, $admin_name, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {  
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $admin_name;
            $_SESSION['role'] = "admin";  // Set role as admin

            header("Location: index.php");  // Redirect to admin panel
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='login.php';</script>";
            exit();
        }
    }

    // If user not found in both tables
    echo "<script>alert('No user found with this email!'); window.location.href='login.php';</script>";

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Login</h2>
            <?php 
                if (isset($_SESSION['error'])) { 
                    echo "<p class='error'>{$_SESSION['error']}</p>"; 
                    unset($_SESSION['error']); // Clear error message after showing
                } 
            ?>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>
