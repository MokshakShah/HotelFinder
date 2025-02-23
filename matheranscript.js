document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    const body = document.getElementById('page-body');
    const originalBackground = body.style.backgroundImage;

    const hotelImages = [
        'Westend Hotel.jpg',
        'Hotel Panorama.jpg',
        'Byke Heritage.jpg'
    ];

    cards.forEach((card, index) => {
        card.addEventListener('mouseenter', () => {
            body.style.backgroundImage = `url('${hotelImages[index]}')`;
        });

        card.addEventListener('mouseleave', () => {
            body.style.backgroundImage = originalBackground;
        });
    });
});