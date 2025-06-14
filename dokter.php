<?php
session_start();
include 'koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM dokter");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Dokter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h3>Data Dokter</h3>
  <a href="tambah_dokter.php" class="btn btn-primary mb-3">+ Tambah Dokter</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Spesialis</th>
        <th>Jadwal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($d = mysqli_fetch_assoc($data)) { ?>
      <tr>
        <td><img src="uploads/<?= $d['foto'] ?>" width="80"></td>
        <td><?= $d['nama'] ?></td>
        <td><?= $d['spesialis'] ?></td>
        <td><?= $d['jadwal'] ?></td>
        <td>
          <a href="edit_dokter.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="hapus_dokter.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
