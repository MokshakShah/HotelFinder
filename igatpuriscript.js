document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    const body = document.getElementById('page-body');
    const originalBackground = body.style.backgroundImage;

    const hotelImages = [
        'Regenta place.jpg',
        'Rakabi The Fern.jpg',
        'The blue Lake Resort.jpg'
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