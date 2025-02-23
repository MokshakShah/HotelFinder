<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            background-image: url("hotel_background.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        
        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; 
            text-align: center;
        }

       
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

       
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        
        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

       
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

       
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        
        button[type="submit"]:hover {
            background-color: #45a049;
        }

        
        .register-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Login</h1>

        <form method="POST" action="login.php">
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <p class="register-link">Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>

</body>
</html>








<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "user_auth";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        
        if (password_verify($password, $user['password'])) {

            echo "<script>
                    alert('Login successful! Welcome, " . htmlspecialchars($user['fullname']) . "');
                    window.location.href = 'home.html'; 
                  </script>";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email!";
    }
}

mysqli_close($conn);
?>
