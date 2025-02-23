document.getElementById('signup-form').addEventListener('submit', async function (event) {
    event.preventDefault();
  
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
  
    // Validate passwords
    if (password !== confirmPassword) {
      alert('Passwords do not match!');
      return;
    }
  
    // Send data to the backend
    try {
      const response = await fetch('/register', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password }),
      });
  
      if (response.ok) {
        alert('Account created successfully! You can now log in.');
        window.location.href = 'index.html'; // Redirect to Login page
      } else {
        const errorText = await response.text();
        alert(`Error: ${errorText}`);
      }
    } catch (error) {
      console.error('Error during registration:', error);
      alert('An unexpected error occurred.');
    }
  });
  