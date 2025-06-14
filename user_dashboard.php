<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: login_user.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Dashboard Pasien - RS Digital</title>

<!-- Google Fonts Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

<style>
  :root {
    --primary: #1c4ed8;
    --primary-dark: #1744b3;
    --text-dark: #111827;
    --text-muted: #6b7280;
    --bg-navbar: #ffffff;
    --bg-body: #f8fafc;
    --footer-bg: #f8f9fa;
  }
  * {
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
    background-color: var(--bg-body);
    margin: 0;
    color: var(--text-dark);
  }
  a {
    color: inherit;
    text-decoration: none;
  }

  /* Navbar */
  nav.navbar {
    background-color: var(--bg-navbar);
    box-shadow: 0 2px 8px rgb(0 0 0 / 0.05);
    padding: 0.8rem 2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  nav .brand {
    font-weight: 700;
    font-size: 1.5rem;
    color: var(--primary);
    user-select: none;
  }
  nav .nav-actions button {
    background-color: var(--primary);
    border: none;
    color: white;
    font-weight: 600;
    padding: 0.5rem 1.2rem;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }
  nav .nav-actions button:hover {
    background-color: var(--primary-dark);
  }
  nav button:focus {
    outline: 3px solid var(--primary);
    outline-offset: 2px;
  }

  /* Main container */
  main.container {
    max-width: 900px;
    margin: 3rem auto;
    padding: 0 1rem;
  }
  header h3 {
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 0.25rem;
  }
  header p {
    color: var(--text-muted);
    font-size: 1.1rem;
    margin-top: 0;
    margin-bottom: 2rem;
  }

  /* Grid cards */
  .grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.8rem;
  }
  .card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 5px 15px rgb(0 0 0 / 0.08);
    padding: 2.5rem 2rem;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 1.1rem;
    cursor: pointer;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    text-decoration: none;
    color: var(--text-dark);
  }
  .card:hover {
    box-shadow: 0 15px 35px rgb(0 0 0 / 0.12);
    transform: translateY(-6px);
  }
  .card svg {
    width: 44px;
    height: 44px;
    fill: var(--primary);
  }
  .card h5 {
    margin: 0;
    font-weight: 700;
    font-size: 1.25rem;
  }
  .card p {
    margin: 0;
    color: var(--text-muted);
    font-size: 1rem;
    line-height: 1.4;
  }
  .card:focus {
    outline: 3px solid var(--primary);
    outline-offset: 3px;
  }

  /* Footer */
  footer.footer {
    background-color: #343a40;
    padding: 1.5rem 0;
    margin-top: 4rem;
    text-align: center;
    color: var(--text-muted);
    font-size: 0.9rem;
  }
  .social-icons {
    font-size: 1.5rem;
    display: inline-flex;
    gap: 1.2rem;
    margin-bottom: 0.75rem;
  }
  .social-icons a {
    color: inherit;
    transition: color 0.2s ease;
  }
  .social-icons a[aria-label="Instagram"] {
    color: #C13584;
  }
  .social-icons a[aria-label="Instagram"]:hover {
    color: #a42e70;
  }
  .social-icons a[aria-label="TikTok"] {
    color: #000000;
  }
  .social-icons a[aria-label="TikTok"]:hover {
    color: #222222;
  }
  .social-icons a[aria-label="YouTube"] {
    color: #FF0000;
  }
  .social-icons a[aria-label="YouTube"]:hover {
    color: #cc0000;
  }
</style>
</head>
<body>

<nav class="navbar" role="navigation" aria-label="Main Navigation">
  <div class="brand" aria-label="Rumah Sakit Digital Logo">RS Digital</div>
  <div class="nav-actions">
    <form action="logout.php" method="post" style="display:inline;">
      <button type="submit" aria-label="Logout">Logout</button>
    </form>
  </div>
</nav>

<main class="container">
  <header>
    <h3>Halo, <?= htmlspecialchars($_SESSION['nama_user']); ?>!</h3>
    <p>Selamat datang di dashboard pasien Rumah Sakit Digital.</p>
  </header>

  <div class="grid" role="list">
    <a href="jadwal_dokter_user.php" class="card" role="listitem" tabindex="0" aria-label="Lihat Jadwal Dokter">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 14H5V9h14ZM7 11h5v5H7Z"/></svg>
      <h5>Jadwal Dokter</h5>
      <p>Lihat jadwal praktik dokter untuk membuat janji temu.</p>
    </a>

    <a href="booking.php" class="card" role="listitem" tabindex="0" aria-label="Booking Janji Temu">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 12h-5v5h-2v-5H7v-2h3V7h2v3h5Zm3-9H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Zm0 16H4V5h16Z"/></svg>
      <h5>Booking Janji Temu</h5>
      <p>Pesan janji temu dengan dokter pilihan Anda.</p>
    </a>

    <a href="riwayat_booking.php" class="card" role="listitem" tabindex="0" aria-label="Riwayat Booking">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v7l5 3-1 1.73L10 13V5Z"/></svg>
      <h5>Riwayat Booking</h5>
      <p>Lihat riwayat janji temu dan statusnya.</p>
    </a>

    <a href="edit_profil.php" class="card" role="listitem" tabindex="0" aria-label="Edit Profil">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 17v3h3l7.34-7.34-3-3L3 17Zm15.13-8.87a1.25 1.25 0 0 0-1.77 0L13.41 12l3 3 3.96-3.96a1.25 1.25 0 0 0 0-1.77l-2.24-2.24Z"/></svg>
      <h5>Profil Saya</h5>
      <p>Kelola data pribadi dan password Anda.</p>
    </a>
  </div>
</main>

<footer class="footer" role="contentinfo">
  <div class="container text-center">
    <div class="social-icons" aria-label="Social Media Links">
      <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
      <a href="https://tiktok.com" target="_blank" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
      <a href="https://youtube.com" target="_blank" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
    </div>
    <p>&copy; 2025 Rumah Sakit Bersama. All rights reserved.</p>
  </div>
</footer>

</body>
</html>
