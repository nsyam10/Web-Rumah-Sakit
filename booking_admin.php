<?php
session_start();
include 'koneksi.php';
if ($_SESSION['role'] != 'admin') {
    header("Location: login_admin.php");
    exit;
}

$query = "SELECT b.*, u.nama as nama_user, j.nama_dokter, j.spesialis 
          FROM booking b
          JOIN users u ON b.user_id = u.id
          JOIN jadwal_dokter j ON b.jadwal_id = j.id
          ORDER BY b.tanggal DESC";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Kelola Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h3>Kelola Booking Pemeriksaan</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Pasien</th>
        <th>Dokter</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($d = mysqli_fetch_assoc($data)) { ?>
      <tr>
        <td><?= $d['nama_user'] ?></td>
        <td><?= $d['nama_dokter'] ?> (<?= $d['spesialis'] ?>)</td>
        <td><?= $d['tanggal'] ?></td>
        <td><span class="badge bg-<?= $d['status'] == 'Menunggu' ? 'warning' : ($d['status'] == 'Dikonfirmasi' ? 'success' : 'secondary') ?>">
          <?= $d['status'] ?>
        </span></td>
        <td>
          <?php if ($d['status'] == 'Menunggu') { ?>
            <a href="verifikasi_booking.php?id=<?= $d['id'] ?>&aksi=konfirmasi" class="btn btn-success btn-sm">Konfirmasi</a>
            <a href="verifikasi_booking.php?id=<?= $d['id'] ?>&aksi=tolak" class="btn btn-danger btn-sm">Tolak</a>
          <?php } else { echo '-'; } ?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
