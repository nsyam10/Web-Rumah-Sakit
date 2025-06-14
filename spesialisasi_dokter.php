<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Spesialisasi Dokter - RS Bersama</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }
    .doctor-card {
      background: white;
      border-radius: 0.5rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 1rem;
      margin-bottom: 2rem;
      transition: transform 0.2s ease;
    }
    .doctor-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .doctor-photo {
      width: 100%;
      border-radius: 0.5rem;
      object-fit: cover;
      height: 220px;
    }
    .doctor-name {
      font-weight: 700;
      font-size: 1.2rem;
      margin-top: 0.75rem;
      color: #0d6efd;
    }
    .doctor-specialist {
      font-weight: 600;
      font-size: 1rem;
      color: #6c757d;
      margin-bottom: 0.5rem;
    }
    .doctor-desc {
      font-size: 0.9rem;
      color: #495057;
    }
    h2 {
      margin-bottom: 2rem;
      font-weight: 700;
      color: #212529;
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

<!-- Konten -->
<div class="container py-5">
  <h2 class="text-center">Spesialisasi Dokter</h2>
  <div class="row g-4">
    
    <!-- Dokter Umum -->
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=10" alt="Dr. Agus Santoso" class="doctor-photo" />
        <div class="doctor-name">Dr. Agus Santoso</div>
        <div class="doctor-specialist">Dokter Umum</div>
        <p class="doctor-desc">Berpengalaman lebih dari 15 tahun dalam menangani berbagai keluhan medis umum dengan pendekatan personal dan profesional.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=11" alt="Dr. Rina Sari" class="doctor-photo" />
        <div class="doctor-name">Dr. Rina Sari</div>
        <div class="doctor-specialist">Dokter Umum</div>
        <p class="doctor-desc">Spesialis pelayanan kesehatan keluarga dan konsultasi medis sehari-hari, selalu mengutamakan kenyamanan pasien.</p>
      </div>
    </div>

    <!-- Spesialis Anak -->
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=12" alt="Dr. Maya Putri" class="doctor-photo" />
        <div class="doctor-name">Dr. Maya Putri</div>
        <div class="doctor-specialist">Spesialis Anak</div>
        <p class="doctor-desc">Ahli dalam perawatan kesehatan anak mulai dari bayi hingga remaja, dengan pendekatan yang ramah dan sabar.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=13" alt="Dr. Adi Wijaya" class="doctor-photo" />
        <div class="doctor-name">Dr. Adi Wijaya</div>
        <div class="doctor-specialist">Spesialis Anak</div>
        <p class="doctor-desc">Mendedikasikan diri dalam penanganan penyakit anak dan imunisasi dengan metode komunikasi efektif kepada anak dan orang tua.</p>
      </div>
    </div>

    <!-- Spesialis Bedah -->
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=14" alt="Dr. Budi Hartono" class="doctor-photo" />
        <div class="doctor-name">Dr. Budi Hartono, Sp.B</div>
        <div class="doctor-specialist">Spesialis Bedah</div>
        <p class="doctor-desc">Menguasai berbagai teknik bedah modern dengan pengalaman lebih dari 10 tahun, fokus pada keselamatan dan pemulihan pasien.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=15" alt="Dr. Lina Febrianti" class="doctor-photo" />
        <div class="doctor-name">Dr. Lina Febrianti, Sp.B</div>
        <div class="doctor-specialist">Spesialis Bedah</div>
        <p class="doctor-desc">Berkomitmen memberikan layanan bedah dengan perawatan pasca operasi terbaik serta pendekatan empati tinggi.</p>
      </div>
    </div>

    <!-- Spesialis Jantung -->
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=16" alt="Dr. Hendra Pratama" class="doctor-photo" />
        <div class="doctor-name">Dr. Hendra Pratama, Sp.JP</div>
        <div class="doctor-specialist">Spesialis Jantung</div>
        <p class="doctor-desc">Ahli dalam diagnosa dan terapi penyakit jantung, siap mendampingi pasien dengan teknologi terkini.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=17" alt="Dr. Sinta Dewi" class="doctor-photo" />
        <div class="doctor-name">Dr. Sinta Dewi, Sp.JP</div>
        <div class="doctor-specialist">Spesialis Jantung</div>
        <p class="doctor-desc">Mengedepankan pencegahan dan rehabilitasi jantung, dengan pendekatan holistik dan dukungan penuh untuk pasien.</p>
      </div>
    </div>

    <!-- Spesialis Gigi -->
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=18" alt="Drg. Riko Santoso" class="doctor-photo" />
        <div class="doctor-name">Drg. Riko Santoso</div>
        <div class="doctor-specialist">Spesialis Gigi</div>
        <p class="doctor-desc">Mengutamakan perawatan gigi dan mulut dengan teknologi terkini dan suasana nyaman untuk pasien.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=19" alt="Drg. Fitri Amalia" class="doctor-photo" />
        <div class="doctor-name">Drg. Fitri Amalia</div>
        <div class="doctor-specialist">Spesialis Gigi</div>
        <p class="doctor-desc">Berpengalaman dalam estetika dan kesehatan gigi anak hingga dewasa, dengan pelayanan ramah dan profesional.</p>
      </div>
    </div>

    <!-- Spesialis Kandungan -->
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=20" alt="Dr. Wulan Sari" class="doctor-photo" />
        <div class="doctor-name">Dr. Wulan Sari, Sp.OG</div>
        <div class="doctor-specialist">Spesialis Kandungan</div>
        <p class="doctor-desc">Mendampingi ibu hamil dan melakukan perawatan kandungan dengan perhatian penuh dan teknologi modern.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=21" alt="Dr. Dedi Prasetyo" class="doctor-photo" />
        <div class="doctor-name">Dr. Dedi Prasetyo, Sp.OG</div>
        <div class="doctor-specialist">Spesialis Kandungan</div>
        <p class="doctor-desc">Berpengalaman dalam proses persalinan dan perawatan pasca melahirkan, serta konsultasi kesehatan wanita.</p>
      </div>
    </div>

    <!-- Spesialis Saraf -->
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=22" alt="Dr. Indra Kurniawan" class="doctor-photo" />
        <div class="doctor-name">Dr. Indra Kurniawan, Sp.S</div>
        <div class="doctor-specialist">Spesialis Saraf</div>
        <p class="doctor-desc">Ahli dalam diagnosa dan penanganan gangguan saraf dengan metode modern dan terapi personal.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=23" alt="Dr. Maya Anindita" class="doctor-photo" />
        <div class="doctor-name">Dr. Maya Anindita, Sp.S</div>
        <div class="doctor-specialist">Spesialis Saraf</div>
        <p class="doctor-desc">Mendedikasikan diri untuk memberikan perawatan terbaik dalam berbagai keluhan saraf dengan empati tinggi.</p>
      </div>
    </div>

    <!-- Spesialis Kulit & Kelamin -->
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=24" alt="Dr. Sari Melati" class="doctor-photo" />
        <div class="doctor-name">Dr. Sari Melati, Sp.KK</div>
        <div class="doctor-specialist">Spesialis Kulit & Kelamin</div>
        <p class="doctor-desc">Ahli perawatan kulit dan penyakit kelamin dengan pendekatan estetika dan medis terbaik.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="doctor-card">
        <img src="https://i.pravatar.cc/300?img=25" alt="Dr. Agus Wijaya" class="doctor-photo" />
        <div class="doctor-name">Dr. Agus Wijaya, Sp.KK</div>
        <div class="doctor-specialist">Spesialis Kulit & Kelamin</div>      
        <p class="doctor-desc">Menangani berbagai gangguan kulit dan kelamin dengan metode diagnosis akurat dan pelayanan ramah pasien.</p>
      </div>
    </div>

  </div> <!-- Penutup row -->
</div> <!-- Penutup container -->

<!-- Footer -->
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>