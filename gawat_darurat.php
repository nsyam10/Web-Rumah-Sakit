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
    }
    .footer {
      background-color: rgb(255, 255, 255);
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

<!-- Konten Utama -->
<div class="container py-5">
  <h1 class="mb-4 text-danger text-center">Layanan Gawat Darurat</h1>
  <p class="text-center">Klik tombol di bawah untuk melihat daftar kontak rumah sakit:</p>
  <div class="text-center mb-4">
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#daruratModal">
      📞 Lihat Daftar Rumah Sakit
    </button>
  </div>
</div>

<!-- Modal Gawat Darurat -->
<div class="modal fade" id="daruratModal" tabindex="-1" aria-labelledby="daruratModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="daruratModalLabel">Kontak Rumah Sakit - Gawat Darurat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <h5>IGD (Instalasi Gawat Darurat):</h5>
        <ul>
          <li>📱 (021) 1234 5678</a></li>
          <li>📲 +62 812 3456 7890 (WhatsApp)</a></li>
        </ul>

        <h5 class="mt-4">Ambulans:</h5>
        <ul>
          <li>☎️ (021) 8765 4321</a></li>
          <li>📲 +62 813 9876 5432</a></li>
        </ul>

        <h5 class="mt-4">Call Center Rumah Sakit:</h5>
        <ul>
          <li>📞 1500-911</a></li>
          <li>✉️ rsbersama@gmail.com</a></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
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
