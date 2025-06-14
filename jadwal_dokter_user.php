<?php
session_start();
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT jadwal.*, dokter.nama AS nama_dokter FROM jadwal JOIN dokter ON jadwal.dokter_id = dokter.id");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Jadwal Dokter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
  .btn-kembali {
      background-color: #e3f0fa;
      color: #1976d2;
      border: none;
      border-radius: 20px;
      padding: 8px 22px;
      font-weight: 600;
      transition: background 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      box-shadow: 0 2px 8px rgba(25, 118, 210, 0.07);
      text-decoration: none;
  }
  .btn-kembali:hover {
      background-color: #bbdefb;
      color: #0d47a1;
      text-decoration: none;
  }
  .btn-kembali i {
      font-size: 1.1em;
  }
  </style>
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">Jadwal Praktik Dokter</h3>
  <a href="user_dashboard.php" class="btn-kembali mb-3">
      <i class="bi bi-arrow-left"></i> Kembali
  </a>
  <table class="table table-bordered bg-white">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Dokter</th>
        <th>Hari</th>
        <th>Jam</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while($row = mysqli_fetch_assoc($query)) { ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_dokter']; ?></td>
        <td><?= $row['hari']; ?></td>
        <td><?= $row['jam_mulai']; ?> - <?= $row['jam_selesai']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
