<?php
session_start();
require 'config3.php';

$user_name = $_SESSION['email'];
echo "Hello ". $user_name;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
 
    <form action="signup3.php" method="post" enctype="multipart/form-data">
       
    </form>
</body>
</html>
