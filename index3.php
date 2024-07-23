<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
      }
      .container {
        text-align: center;
        padding: 30px;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      h1 {
        font-size: 3rem;
        color: #333;
        margin-bottom: 30px;
      }
      .btn {
        font-size: 1.25rem;
        padding: 15px 30px;
        border-radius: 50px;
        margin: 10px;
      }
      .btn-login {
        background-color: #007bff;
        color: #fff;
        border: none;
      }
      .btn-login:hover {
        background-color: #0056b3;
      }
      .btn-signup {
        background-color: #dc3545;
        color: #fff;
        border: none;
      }
      .btn-signup:hover {
        background-color: #c82333;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Hello there</h1>
      <a href="login3.php" class="btn btn-login">Login</a>
      <a href="signup3.php" class="btn btn-signup">Sign Up</a>
    </div>
  </body>
</html>