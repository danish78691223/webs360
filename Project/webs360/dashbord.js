document.getElementById('toggle-dark-mode').addEventListener('click', function() {
    // Toggle dark mode class on the body
    document.body.classList.toggle('dark-mode');

    // Toggle dark mode class on other elements as needed
    document.querySelectorAll('.sidebar').forEach(function(element) {
        element.classList.toggle('dark-mode');
    });

    document.querySelectorAll('.card').forEach(function(element) {
        element.classList.toggle('dark-mode');
    });

    document.querySelectorAll('.content').forEach(function(element) {
        element.classList.toggle('dark-mode');
    });

    // Optionally, save the user's preference in localStorage
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
    } else {
        localStorage.setItem('darkMode', 'disabled');
    }
});

// On page load, check if dark mode was enabled
window.addEventListener('load', function() {
    if (localStorage.getItem('darkMode') === 'enabled') {
        document.body.classList.add('dark-mode');

        document.querySelectorAll('.sidebar').forEach(function(element) {
            element.classList.add('dark-mode');
        });

        document.querySelectorAll('.card').forEach(function(element) {
            element.classList.add('dark-mode');
        });

        document.querySelectorAll('.content').forEach(function(element) {
            element.classList.add('dark-mode');
        });
    }
});
