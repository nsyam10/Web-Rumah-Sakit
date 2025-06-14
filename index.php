<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rumah Sakit Bersama</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }
    .carousel-caption {
      background: rgba(0,0,0,0.5);
      padding: 1rem;
      border-radius: 0.5rem;
    }
    .hero-actions {
      margin-top: 1rem;
    }
    .hero-actions .btn {
      margin: 0.3rem;
      padding: 0.6rem 1.2rem;
      font-size: 1rem;
    }
    footer.bg-primary {
      background: rgba(240, 240, 240, 0.85); /* abu-abu muda, transparan */
      color: #222;
      border-top-left-radius: 2rem;
      border-top-right-radius: 2rem;
      box-shadow: 0 -4px 24px 0 rgba(41,128,185,0.06);
    }
    footer .fw-bold {
      color: #222;
    }
    footer .text-white,
    footer .text-white:visited {
      color: #222 !important;
    }
    footer .bg-dark {
      background: rgba(200,200,200,0.7) !important;
      color: #222 !important;
      border-bottom-left-radius: 2rem;
      border-bottom-right-radius: 2rem;
    }
    footer hr {
      background-color: #bbb;
      opacity: 0.5;
    }
    footer a.text-white,
    footer a.text-white:visited {
      color: #2980b9 !important;
    }
    footer a.text-white:hover, footer a.text-white:focus {
      color: #0d6efd !important;
      text-decoration: underline;
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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand text-primary" href="#">
      <img src="assets/img/logo.png" alt="Logo" width="40" height="40" class="me-2" />
      RS Bersama
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="tentang_kami.php">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="spesialisasi_dokter.php">Spesialisasi Dokter</a></li>
        <li class="nav-item"><a class="nav-link text-danger" href="gawat_darurat.php">Gawat Darurat</a></li>
      </ul>
      <form class="d-flex me-3" role="search">
        <input class="form-control form-control-sm me-2" type="search" placeholder="Cari..." />
        <button class="btn btn-outline-primary btn-sm" type="submit">Cari</button>
      </form>
      <a href="login_user.php" class="btn btn-primary btn-sm">Login / Daftar</a>
    </div>
  </div>
</nav>

<!-- Carousel Section -->
<div id="carouselBeranda" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselBeranda" data-bs-slide-to="0" class="active" aria-current="true"></button>
    <button type="button" data-bs-target="#carouselBeranda" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselBeranda" data-bs-slide-to="2"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/slider1.png" class="d-block w-100" alt="Slide 1">
      <div class="carousel-caption d-none d-md-block">
        <h3>Pelayanan Terbaik untuk Anda</h3>
        <p>Ramah, cepat, dan profesional</p>
        <div class="hero-actions">
          <a href="daftar_dokter.php" class="btn btn-outline-light"><i class="bi bi-calendar2-check"></i> Booking Dokter</a>
          <a href="jadwal_dokter.php" class="btn btn-outline-light"><i class="bi bi-clock-history"></i> Lihat Jadwal</a>
          <a href="gawat_darurat.php" class="btn btn-danger"><i class="bi bi-telephone-fill"></i> IGD 24 Jam</a>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider2.jpg" class="d-block w-100" alt="Slide 2">
      <div class="carousel-caption d-none d-md-block">
        <h3>Fasilitas Modern</h3>
        <p>Didukung oleh teknologi terkini</p>
        <div class="hero-actions">
          <a href="daftar_dokter.php" class="btn btn-outline-light"><i class="bi bi-calendar2-check"></i> Booking Dokter</a>
          <a href="jadwal_dokter.php" class="btn btn-outline-light"><i class="bi bi-clock-history"></i> Lihat Jadwal</a>
          <a href="gawat_darurat.php" class="btn btn-danger"><i class="bi bi-telephone-fill"></i> IGD 24 Jam</a>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider3.jpg" class="d-block w-100" alt="Slide 3">
      <div class="carousel-caption d-none d-md-block">
        <h3>Dokter Spesialis Profesional</h3>
        <p>Siap melayani 24 jam</p>
        <div class="hero-actions">
          <a href="daftar_dokter.php" class="btn btn-outline-light"><i class="bi bi-calendar2-check"></i> Booking Dokter</a>
          <a href="jadwal_dokter.php" class="btn btn-outline-light"><i class="bi bi-clock-history"></i> Lihat Jadwal</a>
          <a href="gawat_darurat.php" class="btn btn-danger"><i class="bi bi-telephone-fill"></i> IGD 24 Jam</a>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselBeranda" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselBeranda" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
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
