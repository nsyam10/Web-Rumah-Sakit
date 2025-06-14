<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tentang Kami - RS Bersama</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }
    .footer {
      background-color: rgb(253, 253, 253);
      padding: 1.5rem 0;
      color: #ccc;
      text-align: center;
    }
    .social-icons {
      font-size: 1.5rem;
      display: inline-flex;
      gap: 1.2rem;
      margin-bottom: 0.75rem;
    }
    .social-icons a {
      color: inherit;
    }
    .social-icons a[aria-label="Instagram"] { color: #C13584; }
    .social-icons a[aria-label="TikTok"] { color: #000000; }
    .social-icons a[aria-label="YouTube"] { color: #FF0000; }

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
    .icon-box:hover {
      transform: translateY(-5px);
    }
    .icon-box i {
      font-size: 2.5rem;
      color: #0d6efd;
      margin-bottom: 10px;
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

<!-- Navbar -->
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
        <li class="nav-item"><a class="nav-link active" href="tentang_kami.php">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="spesialisasi_dokter.php">Spesialisasi Dokter</a></li>
        <li class="nav-item"><a class="nav-link text-danger" href="gawat_darurat.php">Gawat Darurat</a></li>
      </ul>
      <a href="login.php" class="btn btn-primary btn-sm">Login / Daftar</a>
    </div>
  </div>
</nav>

<!-- Tentang Kami -->
<div class="container py-5">
  <h2 class="text-center section-title mb-4">Tentang Kami</h2>
  <p class="lead text-center mb-5">
    RS Bersama adalah rumah sakit terdepan yang mengutamakan keselamatan, kenyamanan, dan kepercayaan pasien.
    Dengan pengalaman lebih dari 15 tahun, kami menghadirkan layanan kesehatan berkualitas tinggi yang
    didukung oleh teknologi modern dan tim medis profesional.
  </p>

  <div class="row g-4">
    <div class="col-md-4">
      <a href="pelayanan_24jam.php" class="text-decoration-none text-dark">
        <div class="icon-box">
          <i class="bi bi-heart-pulse-fill"></i>
          <h5 class="mt-3">Pelayanan 24 Jam</h5>
          <p>Kami siap melayani Anda sepanjang waktu, termasuk layanan IGD, rawat inap, dan konsultasi dokter umum maupun spesialis.</p>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="fasilitas_modern.php" class="text-decoration-none text-dark">
        <div class="icon-box">
          <i class="bi bi-hospital-fill"></i>
          <h5 class="mt-3">Fasilitas Modern</h5>
          <p>RS Bersama dilengkapi ruang rawat, ICU, laboratorium, dan peralatan diagnostik terbaru untuk mendukung kesembuhan pasien.</p>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="dokter_profesional.php" class="text-decoration-none text-dark">
        <div class="icon-box">
          <i class="bi bi-people-fill"></i>
          <h5 class="mt-3">Dokter Profesional</h5>
          <p>Kami memiliki dokter-dokter berpengalaman di berbagai bidang spesialisasi yang siap memberikan perawatan terbaik.</p>
        </div>
      </a>
    </div>
  </div>
</div>

<footer class="bg-primary text-white pt-5 pb-4 mt-5">
  <div class="container text-md-left">
    <div class="row text-md-left">
      <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold">RS Bersama</h6>
        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ffffff; height: 2px"/>
        <p>Kami berkomitmen memberikan pelayanan kesehatan terbaik dengan tenaga profesional dan fasilitas lengkap.</p>
      </div>

      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold">Navigasi</h6>
        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ffffff; height: 2px"/>
        <p><a href="index.php" class="text-white text-decoration-none">Beranda</a></p>
        <p><a href="tentang_kami.php" class="text-white text-decoration-none">Tentang Kami</a></p>
        <p><a href="spesialisasi_dokter.php" class="text-white text-decoration-none">Spesialisasi Dokter</a></p>
        <p><a href="gawat_darurat.php" class="text-white text-decoration-none">Gawat Darurat</a></p>
      </div>

      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <h6 class="text-uppercase fw-bold">Kontak</h6>
        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ffffff; height: 2px"/>
        <p><i class="bi bi-geo-alt-fill me-2"></i>Jl. Sehat No. 123, Jakarta</p>
        <p><i class="bi bi-envelope-fill me-2"></i>info@rsbersama.id</p>
        <p><i class="bi bi-telephone-fill me-2"></i>021-12345678</p>
        <p><i class="bi bi-clock-fill me-2"></i>Senin - Minggu, 24 Jam</p>
      </div>
    </div>
  </div>
  <div class="text-center py-3 bg-dark">
    © 2025 RS Bersama. All rights reserved.
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
