// Check if user is logged in
window.onload = function() {
    fetchUserData();
};

function fetchUserData() {
    fetch('fetch_user.php')
        .then(response => response.json())
        .then(data => {
            const loginSection = document.getElementById('login-section');

            if (data.loggedIn) {
                loginSection.innerHTML = `<a href='profile.php'>Welcome, ${data.username}</a>`;
            } else {
                loginSection.innerHTML = "<a href='login.php'>Login</a>";
            }
        })
        .catch(error => console.error('Error fetching user data:', error));
}

// Example Product Fetching Function (Dynamic Products)
function loadProducts() {
    fetch('get_products.php')
        .then(response => response.json())
        .then(products => {
            const productContainer = document.querySelector('.product-container');

            productContainer.innerHTML = products.map(product => `
                <div class="product-card">
                    <img src="${product.image}" alt="${product.name}">
                    <div class="product-info">
                        <h2>${product.name}</h2>
                        <p>₹${product.price}</p>
                        <button onclick="addToCart(${product.id})">Add to Cart</button>
                    </div>
                </div>
            `).join('');
        })
        .catch(error => console.error('Error loading products:', error));
}

// Add to Cart Function
function addToCart(productId) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: productId })
    })
    .then(response => response.json())
    .then(data => alert(data.message))
    .catch(error => console.error('Error adding to cart:', error));
}

// Initialize product load
loadProducts();





// updated javascript
// shopping.js

// Check login status
window.onload = function () {
    const userLoggedIn = sessionStorage.getItem('userLoggedIn');
    const loginBtn = document.getElementById('loginBtn');
    const profileBtn = document.getElementById('profileBtn');

    if (userLoggedIn) {
        loginBtn.style.display = 'none';
        profileBtn.style.display = 'inline-block';
    } else {
        loginBtn.style.display = 'inline-block';
        profileBtn.style.display = 'none';
    }
};

// Navigate to login page
function goToLogin() {
    window.location.href = 'login.php';
}

// Navigate to profile page
function goToProfile() {
    window.location.href = 'profile.php';
}

// Add to cart functionality
function addToCart(productId) {
    alert('Product ' + productId + ' added to cart!');
}

// Carousel Auto-Slide
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-slide');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

setInterval(nextSlide, 4000); // Change slide every 4 seconds

// Initial slide display
showSlide(currentSlide);

// Dropdown toggle function
function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    dropdown.classList.toggle('show');
}

// Close dropdowns when clicking outside
window.onclick = function (event) {
    if (!event.target.matches('.nav-item')) {
        document.querySelectorAll('.dropdown-content').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    }
};

// Populate Dropdown Categories
function populateDropdown() {
    const categories = {
        'fashionDropdown': ['Men', 'Women', 'Children'],
        'electronicsDropdown': ['Smartphones', 'TVs', 'Laptops'],
        'beautyToysDropdown': ['Beauty Products', 'Toys', 'Other Products']
    };

    Object.keys(categories).forEach(dropdownId => {
        const dropdown = document.getElementById(dropdownId);
        categories[dropdownId].forEach(item => {
            const link = document.createElement('a');
            link.href = '#';
            link.textContent = item;
            dropdown.appendChild(link);
        });
    });
}

populateDropdown();




function showDetails(name, price, description) {
        const popupOverlay = document.createElement('div');
        popupOverlay.className = 'popup-overlay';
        popupOverlay.onclick = () => popupOverlay.remove();

        const popupCard = document.createElement('div');
        popupCard.className = 'popup-card';
        popupCard.innerHTML = `
            <h2>${name}</h2>
            <p>${price}</p>
            <p>${description}</p>
            <button onclick="buyProduct('${name}', '${price}')">Buy Now</button>
            <button onclick="popupOverlay.remove()">Close</button>
        `;

        popupOverlay.appendChild(popupCard);
        document.body.appendChild(popupOverlay);
    }

    function buyProduct(name, price) {
        alert(`Redirecting to purchase: ${name} for ${price}`);
        window.location.href = 'checkout.html';
    }


    
