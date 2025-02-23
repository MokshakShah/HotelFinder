const backgroundImages = [
    'hotel_1.jpg',
    'hotel_2.jpg',
    'hotel_3.jpg'
];
let currentIndex = 0;

function changeBackground() {
    const body = document.querySelector('body');
    body.style.backgroundImage = `url('${backgroundImages[currentIndex]}')`;
    currentIndex = (currentIndex + 1) % backgroundImages.length;
}

setInterval(changeBackground, 4000);
//Link all places
function handleSearch(event) {
    event.preventDefault(); // Prevent form submission and page reload

    const destination = document.getElementById("destination").value.trim().toLowerCase();
    let destinationPage = "";

    // Map destinations to HTML files
    switch (destination) {
        case "bhandardara":
            destinationPage = "bhandardara.html";
            break;
        case "igatpuri":
            destinationPage = "igatpuri.html";
            break;
        case "lonavala":
            destinationPage = "lonavala.html";
            break;
        case "mahabaleshwar":
            destinationPage = "mahabaleshwar.html";
            break;
        case "matheran":
            destinationPage = "matheran.html";
            break;
        default:
            alert("Destination not found! Please enter a valid destination.");
            return;
    }

    // Navigate to the selected destination page
    window.location.href = destinationPage;
}

