<?php
session_start();

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

// Get the current page URL
$currentPage = basename($_SERVER['PHP_SELF']);

// Redirect to original page after login
if (!$isLoggedIn && $currentPage !== 'login.php') {
    $_SESSION['redirect_url'] = $currentPage;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shopping Page</title>
    <link rel="stylesheet" href="shopping.css">
    <script type="text/javascript" src="popup.js"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo">WEB'S 360</div>
        <div class="search-bar">
            <input type="text" placeholder="Search for Products, Brands and More">
        </div>
        <div class="nav-links">
            <?php if ($isLoggedIn): ?>
                <a href="../profile.php">Profile</a>
            <?php else: ?>
                <a href="../login.php">Login</a>
            <?php endif; ?>
            <a href="#">Cart</a>
            <a href="becomeseller.php">Become a Seller</a>
        </div>
    </nav>

    <!-- Categories -->
    <div class="categories">
        <button class="b1" onclick="#">Kilos</button>
        <button class="b1" onclick="#">Mobiles</button>
        <button class="b1" onclick="#">Fashion</button>
        <button class="b1" onclick="#">Electronics</button>
        <button class="b1" onclick="#">Home & Furniture</button>
        <button class="b1" onclick="#">Appliances</button>
        <button class="b1" onclick="#">Flight Bookings</button>
        <button class="b1" onclick="#">Beauty, Toys & More</button>
        <button class="b1" onclick="#">Two Wheelers</button>
    </div>
<!--Slider Section-->
    <div class="slider-container">
    <div class="slider" id="slider">
        <div class="slide"><img src="shopimages/flight.jpg" alt="Book Your Flight Now"><button> Book Now </button></div>
        <div class="slide"><img src="shopimages/close-up-air-fryer.jpg" alt="Image 2"></div>
        <div class="slide"><img src="shopimages/old-device-studio.jpg" alt="Image 3"></div>
        <div class="slide"><img src="shopimages/modern.jpg" alt="Image 4"></div>
        <div class="slide"><img src="shopimages/shop.jpg" alt="Image 5"></div>
    </div>
    <button class="arrow left-arrow" onclick="prevSlide()">&#10094;</button>
    <button class="arrow right-arrow" onclick="nextSlide()">&#10095;</button>
</div>



    <!-- Banner -->
    <div class="banner">
    <img src="shopimages/flight.jpg" alt="Big Savings on Flights!">
    <div class="banner-text">
        <h2>Big Savings on Domestic Flights! With Our Selling Patners</h2>
        <p>Flights from ₹1,299</p>
        <a href="https://www.airindia.com/" target="_blank"><button>Book Now</button></a>
    </div>
</div>

<!-- Best of Electronics Section -->
<section class="products">
   <h2>Best of Electronics</h2>
    <div class="product-grid" id="productGrid">
        <div class="product-card" onclick="showDetails(0)">
            <img src="shopimages/earbuds.jpg" alt="Wireless Earbuds">
            <h3>Wireless Earbuds</h3>
            <p>₹1,999</p>
            <button>View Details</button>
            <button>Buy Now</button>
        </div>
        <div class="product-card" onclick="showDetails(1)">
            <img src="shopimages/gaminglaptop.jpg" alt="Gaming Laptop">
            <h3>Gaming Laptop</h3>
            <p>₹75,999</p>
            <button>View Details</button>
            <button>Buy Now</button>
        </div>
        <div class="product-card" onclick="showDetails(2)">
            <img src="shopimages/printer.jpg" alt="Color Printer">
            <h3>Color Printer</h3>
            <p>₹6,499</p>
            <button>View Details</button>
            <button>Buy Now</button>
        </div>
    </div>
</section>
<section class="products">
    <h2>Beauty, Food, Toys & More</h2>
    <div class="product-grid" id="beautyGrid">
        <div class="product-card" onclick="showDetails(3)">
            <img src="shopimages/coffee.jpg" alt="Nescafe Coffee">
            <h3>Nescafe Coffee</h3>
            <p>₹299</p>
            <button>View Details</button>
            <button>Buy Now</button>
        </div>
        <div class="product-card" onclick="showDetails(4)">
            <img src="shopimages/guitar.png" alt="Acoustic Guitar">
            <h3>Acoustic Guitar</h3>
            <p>₹5,499</p>
            <button>View Details</button>
            <button>Buy Now</button>
        </div>
        <div class="product-card" onclick="showDetails(5)">
            <img src="shopimages/bicycle.jpg" alt="Mountain Bicycle">
            <h3>Mountain Bicycle</h3>
            <p>₹14,999</p>
            <button>View Details</button>
            <button>Buy Now</button>
        </div>
    </div>
    <footer class="footer">
  <div class="footer-container">
    <div class="footer-section">
      <h4>ABOUT</h4>
      <a href="#">Contact Us</a>
      <a href="#">About Us</a>
      <a href="#">Careers</a>
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
      <img src="shopimages/visa.png" alt="Visa">
      <img src="shopimages/mastercard.png" alt="Mastercard">
      <img src="shopimages/rupay.png" alt="RuPay">
      <img src="shopimages/cashondelivery.png" alt="Cash On Delivery">
      <img src="shopimages/service.png" alt="Net Banking">
    </div>
  </div>
</footer>
        <style>
    /* Button Styling */
.b1 {
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background: linear-gradient(145deg, #4e54c8, #8f94fb);
    border: none;
    border-radius: 12px;
    cursor: pointer;
    box-shadow: 0 5px #2a2e70;
    transition: 0.2s ease;
}

/* Hover Effect */
.b1:hover {
     box-shadow: 0 2px #2a2e70;
    transform: translateY(3px);
}

/* Active Effect */
.b1:active {
    transform: translateY(1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

    .banner {
        position: relative;
        width: 100%;
        max-height: 400px;
        overflow: hidden;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        animation: fadeIn 1.5s ease-in-out;
    }

    .banner img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
        transition: transform 0.5s ease-in-out;
    }

    .banner:hover img {
        transform: scale(1.05);
    }

    .banner-text {
        position: absolute;
        top: 50%;
        left: 10%;
        transform: translateY(-50%);
        color: white;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        animation: slideIn 1s ease-in-out;
    }

    .banner-text h2 {
        font-size: 2.5em;
        margin: 0 0 10px;
        animation: fadeInUp 1s ease-in-out;
    }

    .banner-text p {
        font-size: 1.5em;
        margin: 0 0 20px;
    }

    .banner-text button {
        padding: 12px 24px;
        background-color: #ff6f00;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .banner-text button:hover {
        background-color: #e65c00;
    }


    .slider-container {
            width: 100%;
            max-height: 200px;
            position: relative;
            overflow: hidden;
        }
        .slider {
            display: flex;
            transition: transform 1.0s ease-in-out;
        }
        .slide {
            min-width: 100%;
            box-sizing: border-box;
        }
        .slide img {
            width: 100%;
            max-height: 700px;
            object-fit: cover;
        }
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
        }
        .left-arrow { left: 10px; }
        .right-arrow { right: 10px; }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideIn {
        from {
            left: -50%;
        }
        to {
            left: 10%;
        }
    }

    @keyframes fadeInUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>
    <script>
        const products = [
        {
            name: 'Wireless Earbuds',
            price: '₹1,999',
            image: 'shopimages/earbuds.jpg',
            description: 'Experience premium sound quality with our wireless earbuds featuring noise cancellation and long battery life.'
        },
        {
            name: 'Gaming Laptop',
            price: '₹75,999',
            image: 'shopimages/gaminglaptop.jpg',
            description: 'High-performance gaming laptop with RTX graphics card, 16GB RAM, and a 144Hz display.'
        },
        {
            name: 'Color Printer',
            price: '₹6,499',
            image: 'shopimages/printer.jpg',
            description: 'Efficient color printer with wireless connectivity and fast printing speed.'
        }
    ];

    let currentProductIndex = 0;

    function showDetails(index) {
        currentProductIndex = index;
        renderPopup();
    }

    function renderPopup() {
        const product = products[currentProductIndex];
        const popupOverlay = document.createElement('div');
        popupOverlay.className = 'popup-overlay';

        popupOverlay.innerHTML = `
            <div class="popup-card">
                <img src="${product.image}" alt="${product.name}">
                <h2>${product.name}</h2>
                <p>${product.price}</p>
                <p>${product.description}</p>
                <div class="popup-controls">
                    <button onclick="prevProduct()">Previous</button>
                    <button onclick="nextProduct()">Next</button>
                    <button onclick="closePopup()">Close</button>
                </div>
            </div>
        `;

        popupOverlay.addEventListener('click', (e) => {
            if (e.target === popupOverlay) closePopup();
        });

        document.body.appendChild(popupOverlay);
    }

    function closePopup() {
        document.querySelector('.popup-overlay').remove();
    }

    function nextProduct() {
        currentProductIndex = (currentProductIndex + 1) % products.length;
        closePopup();
        renderPopup();
    }

    function prevProduct() {
        currentProductIndex = (currentProductIndex - 1 + products.length) % products.length;
        closePopup();
        renderPopup();
    }
</script>
<script>
    const slider = document.getElementById('slider');
    const slides = document.querySelectorAll('.slide');
    let currentIndex = 0;

    function showSlide(index) {
        if (index < 0) {
            index = slides.length - 1;
        } else if (index >= slides.length) {
            index = 0;
        }
        slider.style.transform = `translateX(-${index * 100}%)`;
        currentIndex = index;
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    setInterval(nextSlide, 3000); // Auto-scroll every 3 seconds
</script>
    <script src="shopping.js"></script>
</body>

</html>
