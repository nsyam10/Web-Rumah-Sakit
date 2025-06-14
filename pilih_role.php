<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Selamat Datang - Rumah Sakit Digital</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f8fafc;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      text-align: center;
    }
    h1 {
      color: #1c4ed8;
      font-size: 2rem;
      margin-bottom: 2rem;
    }
    .role-options {
      display: flex;
      justify-content: center;
      gap: 2rem;
      flex-wrap: wrap;
    }
    .role-card {
      background: white;
      padding: 2rem 1.5rem;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.08);
      text-align: center;
      width: 220px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }
    .role-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }
    .role-card img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 1rem;
    }
    .role-card h3 {
      margin: 0;
      font-size: 1.2rem;
      color: #111827;
    }
    a {
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Masuk sebagai siapa?</h1>
  <div class="role-options">
    <a href="login_admin.php">
      <div class="role-card" role="button" tabindex="0" aria-label="Masuk sebagai Admin">
        <img src="assets//img/admin.jpg" alt="Admin">
        <h3>Admin</h3>
      </div>
    </a>
    <a href="index.php">
      <div class="role-card" role="button" tabindex="0" aria-label="Masuk sebagai User">
        <img src="assets/img/user.jpg" alt="User">
        <h3>Pasien</h3>
      </div>
    </a>
  </div>
</div>

</body>
</html>
