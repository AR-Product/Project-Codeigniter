<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - PetShop</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #fbc2eb, #a6c1ee);
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .register-container {
      background: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      width: 450px;
      text-align: center;
    }
    .register-container img {
      width: 90px;
      margin-bottom: 20px;
    }
    .register-container h2 {
      margin-bottom: 20px;
      font-weight: 600;
      color: #333;
    }
    .register-container input, .register-container select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
    }
    .register-container button {
      width: 100%;
      background-color: #ff7eb3;
      color: white;
      padding: 14px;
      margin-top: 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: background 0.3s;
    }
    .register-container button:hover {
      background-color: #e57aa2;
    }
    .footer {
      margin-top: 20px;
      font-size: 12px;
      color: #666;
    }
  </style>
</head>
<body>

<div class="register-container">
  <img src="<?= base_url('logo.jpg') ?>" alt="Petshop Logo">
  <h2>Create Account</h2>
  <?php if (session()->getFlashdata('error')): ?>
    <div style="background: #ffccd5; color: #900; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div style="background: #ccffcc; color: #090; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

  <form action="<?= base_url('register/process') ?>" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    
    <select name="role" required>
      <option value="">-- Select Role --</option>
      <option value="pelanggan">Pelanggan</option>
      <option value="admin">Admin</option>
      <option value="dokter">Dokter</option>
    </select>
    
    <button type="submit">Register</button>
  </form>
  
  <div class="footer">
    Already have an account? <a href="<?= base_url('login') ?>">Login</a>
  </div>
</div>

</body>
</html>
