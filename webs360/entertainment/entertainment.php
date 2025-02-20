<?php
require_once 'media.php';
$mediaList = fetchMedia();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Entertainment - WEB'S 360</title>
    <link rel="stylesheet" href="entertainment.css">
    <script src="entertainment.js" defer></script>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="../index.php" class="logo">WEB'S 360</a>
        <div class="nav-links">
            <a href="../aboutus.html">About Us</a>
            <a href="../contactus.html">Contact Us</a>
            <a href="../help.html">Help</a>
            <a href="#">Entertainment</a>
        </div>
    </div>

    <!-- Hero Section -->
    <header class="hero-section">
        <h1>Unleash the Fun with WEB'S 360</h1>
        <p>Movies, Music, Games, and Live Events – All in One Place!</p>
    </header>

    <!-- Dynamic Content Section -->
    <section class="content-section">
        <h2>Explore Entertainment</h2>
        <div id="filter-buttons">
            <button onclick="filterMedia('all')">All</button>
            <button onclick="filterMedia('Movie')">Movies</button>
            <button onclick="filterMedia('Music')">Music</button>
            <button onclick="filterMedia('Game')">Games</button>
            <button onclick="filterMedia('Live Event')">Live Events</button>
        </div>

        <div class="media-container" id="mediaContainer">
            <?php foreach ($mediaList as $media): ?>
                <div class="media-card" data-category="<?= $media['category']; ?>">
                    <img src="<?= $media['thumbnail_url']; ?>" alt="<?= $media['title']; ?>">
                    <h3><?= $media['title']; ?></h3>
                    <p><?= $media['description']; ?></p>
                    <button onclick="playMedia('<?= $media['media_url']; ?>')">Watch Now</button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Footer -->
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
    <span>© 2024-2025 Webs'360.com</span>

    <div class="payment-icons">
      <img src="images/visa.png" alt="Visa">
      <img src="images/mastercard.png" alt="Mastercard">
      <img src="images/rupay.png" alt="RuPay">
      <img src="images/cashondelivery.png" alt="Cash On Delivery">
      <img src="images/service.png" alt="Net Banking">
    </div>
  </div>
</footer>

</body>

</html>
