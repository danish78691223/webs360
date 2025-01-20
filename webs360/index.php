<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB'S 360 - Home</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=home" />
</head>

<body>
    <header>
    <div class="container">
        <div class="navbar">
            <div class="logo">WEB'S 360</div>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav id="side-nav">
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shopping</a></li>
                    <li><a href="#">Entertainment</a></li>
                    <li><a href="#">About Us</a></li>
                    <?php
                    session_start();
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                        echo '<li class="dropdown">';
                        echo '<a href="#" id="profile-toggle" class="dropdown-toggle">' . htmlspecialchars($_SESSION['user_name']) . ' ▼</a>';
                        echo '<ul id="profile-menu" class="dropdown-menu hidden">';
                        echo '<li><a href="dashboard.php">Dashboard</a></li>';
                        echo '<li><a href="logout.php">Logout</a></li>';
                        echo '</ul>';
                        echo '</li>';
                    } else {
                        echo '<li><a href="login.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
<section class="hero-section">
    <div class="hero-content">
        <h1>Welcome to WEB'S 360</h1>
        <p>Your one-stop platform for buying, selling, and managing your business.</p>
        <a href="login.php" class="cta-btnn">Get Started</a>
    </div>
</section>
    <section class="info-section">
        <div class="container">
            <h2>About WEB'S 360</h2>
            <p>WEB'S 360 is designed to simplify your business and lifestyle. Explore our features for shopping, selling, and managing operations efficiently.</p>
            <div class="features">
                <div class="feature">
                    <h3>Shop</h3>
                    <p>Browse and buy the latest products with ease.</p>
                </div>
                <div class="feature">
                    <h3>Sell</h3>
                    <p>Reach a wide audience and grow your sales.</p>
                </div>
                <div class="feature">
                    <h3>Manage</h3>
                    <p>Admins and employees can track operations and analytics.</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2025 WEB'S 360. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
