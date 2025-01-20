<?php
session_start();
$message = "";

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
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
                <!-- Display messages -->
                <?php if ($message): ?>
                    <div class="message"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>

                <!-- Login Form -->
                <form id="login-form" class="auth-form" action="process.php" method="POST">
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
                <form id="register-form" class="auth-form hidden" action="process.php" method="POST">
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
                    <button type="submit" class="auth-btn">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>
