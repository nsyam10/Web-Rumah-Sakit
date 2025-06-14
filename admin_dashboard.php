<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_admin.php");
    exit;
}

// Ambil data
$jumlah_dokter = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM dokter"))['total'];
$jumlah_pasien = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='user'"))['total'];
$tanggal_hari_ini = date('Y-m-d');
$jadwal_hari_ini = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM booking WHERE tanggal = '$tanggal_hari_ini'"))['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - RS Digital</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f1f5f9;
      margin: 0;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #1e3a8a;
      padding: 2rem 1rem;
      position: fixed;
      top: 0;
      left: 0;
      color: white;
      display: flex;
      flex-direction: column;
    }
    .sidebar h4 {
      font-size: 1.6rem;
      font-weight: bold;
      margin-bottom: 2rem;
      text-align: center;
    }
    .sidebar a {
      color: #e0e7ff;
      text-decoration: none;
      padding: 10px 15px;
      margin-bottom: 10px;
      border-radius: 8px;
      transition: background 0.3s;
      font-weight: 500;
    }
    .sidebar a:hover,
    .sidebar a.active {
      background-color: #3b82f6;
      color: white;
    }
    .content {
      margin-left: 250px;
      padding: 2rem;
    }
    .card {
      border: none;
      border-radius: 12px;
      background: white;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
    .card h5 {
      font-weight: 600;
      color: #1e40af;
    }
    .card p {
      font-size: 2.2rem;
      font-weight: bold;
      margin: 0;
      color: #111827;
    }
    .header-title {
      font-size: 1.7rem;
      font-weight: bold;
      margin-bottom: 0.5rem;
    }
    .header-subtext {
      color: #6b7280;
      font-size: 1rem;
    }
    @media screen and (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        flex-direction: row;
        justify-content: space-around;
        position: relative;
      }
      .content {
        margin-left: 0;
        margin-top: 1rem;
      }
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h4>Admin RS</h4>
  <a href="#" class="active">🏠 Dashboard</a>
  <a href="kelola_dokter.php">👨‍⚕️ Kelola Dokter</a>
  <a href="kelola_pasien.php">🧑‍🤝‍🧑 Kelola Pasien</a>
  <a href="kelola_jadwal.php">📅 Jadwal</a>
  <a href="kelola_booking.php">📅 Kelola Booking</a>
  <a href="pilih_role.php">🚪 Logout</a>
</div>

<div class="content">
  <div class="mb-4">
    <div class="header-title">Selamat datang, <?= htmlspecialchars($_SESSION['nama']) ?> 👋</div>
    <div class="header-subtext">Berikut ringkasan aktivitas rumah sakit hari ini.</div>
  </div>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card p-4 text-center">
        <h5>Jumlah Dokter</h5>
        <p><?= $jumlah_dokter ?></p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4 text-center">
        <h5>Jumlah Pasien</h5>
        <p><?= $jumlah_pasien ?></p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4 text-center">
        <h5>Jadwal Hari Ini</h5>
        <p><?= $jadwal_hari_ini ?></p>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12">
      <div class="card p-4">
        <h5 class="mb-4 text-center">Grafik Statistik Rumah Sakit</h5>
        <canvas id="rsChart" height="90"></canvas>
      </div>
    </div>
  </div>
</div> <!-- penutup .content -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('rsChart').getContext('2d');
const rsChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Dokter', 'Pasien', 'Jadwal Hari Ini'],
        datasets: [{
            label: 'Jumlah',
            data: [
                <?= $jumlah_dokter ?>,
                <?= $jumlah_pasien ?>,
                <?= $jadwal_hari_ini ?>
            ],
            backgroundColor: [
                'rgba(59, 130, 246, 0.7)',
                'rgba(16, 185, 129, 0.7)',
                'rgba(234, 179, 8, 0.7)'
            ],
            borderColor: [
                'rgba(59, 130, 246, 1)',
                'rgba(16, 185, 129, 1)',
                'rgba(234, 179, 8, 1)'
            ],
            borderWidth: 2,
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { stepSize: 1 }
            }
        }
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
