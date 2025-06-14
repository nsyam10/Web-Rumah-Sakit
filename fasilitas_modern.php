<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Fasilitas Modern - RS Bersama</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }
    .section-title {
      font-size: 2rem;
      font-weight: bold;
      color: #0d6efd;
    }
    .icon-box {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.05);
      text-align: center;
      transition: transform 0.3s;
    }
    .icon-box i {
      font-size: 2.5rem;
      color: #0d6efd;
      margin-bottom: 10px;
    }
    .icon-box:hover {
      transform: translateY(-5px);
    }
    footer {
      background: linear-gradient(120deg, #2980b9 0%, #6dd5fa 100%);
      border-top-left-radius: 2rem;
      border-top-right-radius: 2rem;
      box-shadow: 0 -4px 24px 0 rgba(41,128,185,0.12);
    }
    footer .social-icons {
      font-size: 1.7rem;
      display: flex;
      gap: 1.2rem;
      margin-top: 0.5rem;
      margin-bottom: 1rem;
    }
    footer .social-icons a {
      color: #fff;
      transition: color 0.2s;
    }
    footer .social-icons a[aria-label="Instagram"]:hover { color: #C13584; }
    footer .social-icons a[aria-label="TikTok"]:hover { color: #000; }
    footer .social-icons a[aria-label="YouTube"]:hover { color: #FF0000; }
    footer .fw-bold {
      letter-spacing: 1px;
    }
    footer a.text-white:hover, footer a.text-white:focus {
      color: #ffe082 !important;
      text-decoration: underline;
    }
  </style>
</head>
<body>

<!-- Navbar (sama seperti tentang_kami.php) -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand text-primary" href="index.php">
      <img src="assets/img/logo.png" alt="Logo" width="40" height="40" class="me-2" />
      RS Bersama
    </a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="tentang_kami.php">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link active" href="fasilitas_modern.php">Fasilitas Modern</a></li>
        <li class="nav-item"><a class="nav-link text-danger" href="gawat_darurat.php">Gawat Darurat</a></li>
      </ul>
      <a href="login.php" class="btn btn-primary btn-sm">Login / Daftar</a>
    </div>
  </div>
</nav>

<!-- Konten Utama -->
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="icon-box mb-4">
        <i class="bi bi-hospital-fill"></i>
        <h2 class="section-title mb-3">Fasilitas Modern</h2>
        <p class="lead">
          RS Bersama dilengkapi dengan fasilitas modern untuk menunjang pelayanan kesehatan terbaik bagi pasien. 
          Kami menyediakan ruang rawat inap nyaman, ICU berstandar tinggi, laboratorium lengkap, serta peralatan diagnostik terbaru.
        </p>
        <ul class="list-group list-group-flush text-start mt-4">
          <li class="list-group-item">✔️ Ruang Rawat Inap & Rawat Jalan</li>
          <li class="list-group-item">✔️ ICU & IGD 24 Jam</li>
          <li class="list-group-item">✔️ Laboratorium & Radiologi Modern</li>
          <li class="list-group-item">✔️ Ruang Operasi & Peralatan Medis Canggih</li>
          <li class="list-group-item">✔️ Apotek & Farmasi Terintegrasi</li>
        </ul>
      </div>
      <div class="text-center">
        <a href="tentang_kami.php" class="btn btn-outline-primary mt-3"><i class="bi bi-arrow-left"></i> Kembali ke Tentang Kami</a>
      </div>
    </div>
  </div>
</div>

<!-- Footer (sama seperti tentang_kami.php) -->
<footer class="bg-primary text-white pt-5 pb-4 mt-5" style="background: linear-gradient(120deg, #2980b9 0%, #6dd5fa 100%); border-top-left-radius: 2rem; border-top-right-radius: 2rem; box-shadow: 0 -4px 24px 0 rgba(41,128,185,0.12);">
  <div class="container text-md-left">
    <div class="row text-md-left">
      <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold">RS Bersama</h6>
        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #fff; height: 2px"/>
        <p>Kami berkomitmen memberikan pelayanan kesehatan terbaik dengan tenaga profesional dan fasilitas lengkap.</p>
        <div class="social-icons mb-2">
          <a href="https://instagram.com/" target="_blank" aria-label="Instagram" class="me-2"><i class="bi bi-instagram"></i></a>
          <a href="https://tiktok.com/" target="_blank" aria-label="TikTok" class="me-2"><i class="bi bi-tiktok"></i></a>
          <a href="https://youtube.com/" target="_blank" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold">Navigasi</h6>
        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #fff; height: 2px"/>
        <p><a href="index.php" class="text-white text-decoration-none">Beranda</a></p>
        <p><a href="tentang_kami.php" class="text-white text-decoration-none">Tentang Kami</a></p>
        <p><a href="spesialisasi_dokter.php" class="text-white text-decoration-none">Spesialisasi Dokter</a></p>
        <p><a href="gawat_darurat.php" class="text-white text-decoration-none">Gawat Darurat</a></p>
      </div>
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <h6 class="text-uppercase fw-bold">Kontak</h6>
        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #fff; height: 2px"/>
        <p><i class="bi bi-geo-alt-fill me-2"></i>Jl. Sehat No. 123, Jakarta</p>
        <p><i class="bi bi-envelope-fill me-2"></i>info@rsbersama.id</p>
        <p><i class="bi bi-telephone-fill me-2"></i>021-12345678</p>
        <p><i class="bi bi-clock-fill me-2"></i>Senin - Minggu, 24 Jam</p>
      </div>
    </div>
  </div>
  <div class="text-center py-3" style="background: rgba(26,34,51,0.95); color: #fff; border-bottom-left-radius: 2rem; border-bottom-right-radius: 2rem;">
    © 2025 RS Bersama. All rights reserved.
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>