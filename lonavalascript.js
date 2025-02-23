document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    const body = document.getElementById('page-body');
    const originalBackground = body.style.backgroundImage;

    const hotelImages = [
        'Whispering_woods.jpg',
        'Sarovar_portico.jpg',
        'Radisson_resort.jpg'
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