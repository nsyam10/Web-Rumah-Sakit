<?php
session_start();
include 'koneksi.php';
if ($_SESSION['role'] != 'user') { header("Location: login.php"); exit; }
$data = mysqli_query($conn, "SELECT * FROM jadwal_dokter");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Jadwal Dokter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h3>Jadwal Dokter</h3>
  <table class="table table-bordered">
    <thead>
      <tr><th>Dokter</th><th>Spesialis</th><th>Hari</th><th>Jam</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      <?php while ($d = mysqli_fetch_assoc($data)) { ?>
        <tr>
          <td><?= $d['nama_dokter'] ?></td>
          <td><?= $d['spesialis'] ?></td>
          <td><?= $d['hari'] ?></td>
          <td><?= $d['jam_mulai'] ?> - <?= $d['jam_selesai'] ?></td>
          <td>
            <a href="booking.php?jadwal=<?= $d['id'] ?>" class="btn btn-sm btn-success">Booking</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
