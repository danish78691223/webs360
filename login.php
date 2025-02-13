<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "auth_system"); // Update with your database credentials

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$alertMessage = ""; // Stores the alert message

// Process login or registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'login') {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        // Check if the email exists
        $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $user['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role']; // Store role in session
                header("Location: index.php");
                exit();
            } else {
                $alertMessage = "Invalid password. Please try again.";
            }
        } else {
            $alertMessage = "No account found with this email.";
        }
    } elseif ($action === 'register') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = mysqli_real_escape_string($conn, $_POST['role']); // Capture role from form

        // Ensure role column exists
        $checkColumn = $conn->query("SHOW COLUMNS FROM users LIKE 'role'");
        if ($checkColumn->num_rows == 0) {
            $conn->query("ALTER TABLE users ADD COLUMN role ENUM('admin', 'user', 'employee') NOT NULL DEFAULT 'user'");
        }

        // Check if email already exists
        $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $emailResult = $checkEmail->get_result();

        if ($emailResult->num_rows > 0) {
            $alertMessage = "Email already registered. Try logging in.";
        } else {
            // Insert into users table with role
            $insertQuery = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
            $insertQuery->bind_param("ssss", $name, $email, $password, $role);

            if ($insertQuery->execute()) {
                $alertMessage = "Registration successful! You can now log in.";
            } else {
                $alertMessage = "Error: " . $insertQuery->error;
            }
        }
    }
}

$conn->close();

// Display alert if message exists
if (!empty($alertMessage)) {
    echo "<script>alert('$alertMessage');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="toggle">
                <button id="login-btn" class="active">Login</button>
                <button id="register-btn">Register</button>
            </div>
            <div class="form-container">
                <!-- Login Form -->
                <form id="login-form" class="auth-form" method="POST">
                    <h2>Login</h2>
                    <input type="hidden" name="action" value="login">
                    <div class="input-group">
                        <label for="login-email">Email</label>
                        <input type="email" id="login-email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="auth-btn">Login</button>
                </form>

                <!-- Register Form -->
                <form id="register-form" class="auth-form hidden" method="POST">
                    <h2>Register</h2>
                    <input type="hidden" name="action" value="register">
                    <div class="input-group">
                        <label for="register-name">Full Name</label>
                        <input type="text" id="register-name" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="input-group">
                        <label for="register-email">Email</label>
                        <input type="email" id="register-email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-group">
                        <label for="register-password">Password</label>
                        <input type="password" id="register-password" name="password" placeholder="Create a password" required>
                    </div>
                    <div class="input-group">
                        <label for="register-role">Role</label>
                        <select id="register-role" name="role" required>
                            <option value="user">User</option>
                            <option value="employee">Employee</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="auth-btn">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>