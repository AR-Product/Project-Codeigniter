<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - PetShop</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #74ebd5, #ACB6E5);
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .login-container {
      background: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      width: 400px;
      text-align: center;
    }
    .login-container img {
      width: 100px;
      margin-bottom: 20px;
    }
    .login-container h2 {
      margin-bottom: 20px;
      font-weight: 600;
      color: #333;
    }
    .login-container input {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
    }
    .login-container button {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px;
      margin-top: 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: background 0.3s;
    }
    .login-container button:hover {
      background-color: #45a049;
    }
    .footer {
      margin-top: 20px;
      font-size: 12px;
      color: #666;
    }
  </style>
</head>
<body>

<div class="login-container">
  <img src="<?= base_url('logo.jpg') ?>" alt="Petshop Logo">
  <h2>Welcome to PetShop</h2>
  
  <form action="<?= base_url('login/process') ?>" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
  <div class="footer">
    Belum Punya Akun? <a href="<?= base_url('register') ?>">Register</a>
  </div>
  <div class="footer">
    &copy; 2025 PetShop. All rights reserved.
  </div>
</div>

</body>
</html>
