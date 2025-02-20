// Filter Media by Category
function filterMedia(category) {
    const mediaCards = document.querySelectorAll('.media-card');
    mediaCards.forEach(card => {
        card.style.display = category === 'all' || card.dataset.category === category ? 'block' : 'none';
    });
}

// Play Media (Simulate Play)
function playMedia(url) {
    alert(`Playing: ${url}`);
}
