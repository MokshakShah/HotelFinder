// script.js

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    if (email && password) {
        console.log("Logging in with", email, password);
        // You can add logic to verify the credentials, such as sending the data to a server
    } else {
        alert("Please fill in both fields.");
    }
});

// Handling Social Login Buttons
document.getElementById('apple').addEventListener('click', function() {
    console.log("Apple login clicked");
});

document.getElementById('google').addEventListener('click', function() {
    console.log("Google login clicked");
});

document.getElementById('facebook').addEventListener('click', function() {
    console.log("Facebook login clicked");
});
