<?php
require 'config3.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id, pass FROM userssss WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();
            
            if (password_verify($password, $hashed_password)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $id; // Store user ID in session

                if ($id == 1) { // Check if user is admin
                    header("Location: admin_dashboard.php");
                    exit(); // Ensure no further output is sent
                } else {
                    header("Location: welcome3.php");
                    exit(); // Ensure no further output is sent
                }
            } else {
                $errors['password'] = "Incorrect password.";
            }
        } else {
            $errors['email'] = "No user found with this email.";
        }

        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
        }
        .form-control {
            border-radius: 0.25rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            font-weight: bold;
        }
        .error {
            color: red;
            font-size: 0.875em;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["password"].value;

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            var isValid = true;

            if (!emailPattern.test(email)) {
                document.getElementById('emailError').innerText = "Invalid email format.";
                isValid = false;
            } else {
                document.getElementById('emailError').innerText = "";
            }

            if (!password) {
                document.getElementById('passwordError').innerText = "Password is required.";
                isValid = false;
            } else {
                document.getElementById('passwordError').innerText = "";
            }

            return isValid;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Login</h2>
        <form name="loginForm" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <small id="emailError" class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></small>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <small id="passwordError" class="error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></small>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
</body>
</html>
