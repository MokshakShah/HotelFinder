<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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


         .registration-container {
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

        
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        
        .register-button {
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

        
        .register-button:hover {
            background-color: #45a049;
        }

        
        .login-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="registration-container">
        <h1>Create Your Account</h1>

        <form method="POST" action="register.php" class="registration-form">
            
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="register-button">Register</button>
        </form>

        <p class="login-link">Already registered? <a href="login.php">Login here</a>.</p>
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
   
    
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO users (fullname, email, phone, password) VALUES ('$fullname', '$email', '$phone', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        
        echo "<script>alert('Registration successful!'); window.location.href = 'login.php';</script>";
        
        
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!-- 

//////////////////////////////////

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,          
    fullname VARCHAR(255) NOT NULL,               
    email VARCHAR(255) NOT NULL UNIQUE,           
    phone VARCHAR(15) NOT NULL,                   
    password VARCHAR(255) NOT NULL,               
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
); -->
