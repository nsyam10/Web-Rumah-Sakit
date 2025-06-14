<?php
session_start();
include 'koneksi.php';

if ($_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM dokter");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar Dokter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card {
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="p-4">
  <h3 class="mb-4">Daftar Dokter</h3>
  <div class="row">
    <?php while ($d = mysqli_fetch_assoc($data)) { ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100 p-3">
        <h5><?= htmlspecialchars($d['nama']) ?></h5>
        <p>Spesialis: <?= htmlspecialchars($d['spesialis']) ?></p>
        <a href="booking_dokter.php?dokter_id=<?= $d['id'] ?>" class="btn btn-primary btn-sm">Booking</a>
      </div>
    </div>
    <?php } ?>
  </div>
</body>
</html>
