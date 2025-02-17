<?php
session_start();
?>

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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shopping/shopping.php">Shopping</a></li>
                        <li><a href="#">Entertainment</a></li>
                        <li><a href="#">About Us</a></li>

                        <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                            echo '<li class="dropdown">';
                            echo '<a href="#" id="profile-toggle" class="dropdown-toggle">' . htmlspecialchars($_SESSION['user_name']) . ' ▼</a>';
                            echo '<ul id="profile-menu" class="dropdown-menu hidden">';
                            
                            if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'employee')) {
                                echo '<li><a href="dashboard.php">Dashboard</a></li>';
                            }

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
                    <a href="shopping/shopping.php"><h3>Shop & Sell</h3></a>
                    <p>Browse and buy the latest products with ease. Reach a wide audience and grow your sales.</p>
                </div>
                <div class="feature">
                    <a href="entertainment.php"><h3>Entertain yourself</h3></a>
                    <p>"Unleash the thrill of entertainment—where fun meets excitement, and every moment is an experience to remember!" 🎭✨</p>
                </div>
                <div class="feature">
                    <a href="admin_register.php"><h3>Manage Business</h3></a>
                    <p>Admins and employees can track operations and analytics.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Toggle mobile menu
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>

    <footer class="footer">
  <div class="footer-container">
    <div class="footer-section">
      <h4>ABOUT</h4>
      <a href="#">Contact Us</a>
      <a href="#">About Us</a>
      <a href="#">Careers</a>
      <a href="#">Flipkart Stories</a>
      <a href="#">Press</a>
      <a href="#">Corporate Information</a>
    </div>

    <div class="footer-section">
      <h4>GROUP COMPANIES</h4>
      <a href="#">Flipkart</a>
      <a href="#">Air India</a>
      <a href="#">Shopsy</a>
    </div>

    <div class="footer-section">
      <h4>HELP</h4>
      <a href="#">Payments</a>
      <a href="#">Shipping</a>
      <a href="#">Cancellation & Returns</a>
      <a href="#">FAQ</a>
    </div>

    <div class="footer-section">
      <h4>CONSUMER POLICY</h4>
      <a href="#">Cancellation & Returns</a>
      <a href="#">Terms Of Use</a>
      <a href="#">Security</a>
      <a href="#">Privacy</a>
      <a href="#">Sitemap</a>
      <a href="#">Grievance Redressal</a>
      <a href="#">EPR Compliance</a>
    </div>

    <div class="footer-section contact-info">
      <h4>Mail Us:</h4>
      <p>WEB'S 360 Private Limited<br>
        07, Sangam Park<br>
        Behind S.G.R.G. Shinde Collage <br>
        Bawachi Road Paranda<br>
        Osmanabad(Dharashiv), 413502,<br>
        Maharashtra, India
      </p>
      <h4>Social:</h4>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-x-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>

    <div class="footer-section contact-info">
      <h4>Registered Office Address:</h4>
      <p>WEB'S 360 Private Limited<br>
        07, Sangam Park<br>
        Behind S.G.R.G. Shinde Collage <br>
        Bawachi Road Paranda<br>
        Osmanabad(Dharashiv), 413502,<br>
        Maharashtra, India<br>
        CIN : U51109KA2012PTC066107<br>
        Telephone: <a href="7709201779">7709201779</a> / <a href="9511749510">9511749510</a>
      </p>
    </div>
  </div>

  <div class="footer-bottom">
    <a href="#">Become a Seller</a>
    <a href="#">Advertise</a>
    <a href="#">Gift Cards</a>
    <a href="#">Help Center</a>
    <span>© 2007-2025 Flipkart.com</span>

    <div class="payment-icons">
      <img src="visa.png" alt="Visa">
      <img src="mastercard.png" alt="Mastercard">
      <img src="rupay.png" alt="RuPay">
      <img src="americanexpress.png" alt="Amex">
      <img src="cashondelivery.png" alt="Cash On Delivery">
      <img src="netbanking.png" alt="Net Banking">
    </div>
  </div>
</footer>

</body>
</html>
