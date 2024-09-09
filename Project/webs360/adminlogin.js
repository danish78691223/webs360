document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const errorMessage = document.getElementById('error-message');

    // Example credentials
    if (username === "admin" && password === "password") {
        window.location.href = "admin-dashbord.html"; // Redirect to the admin dashboard page
    } else {
        errorMessage.textContent = "Invalid username or password!";
    }
});
