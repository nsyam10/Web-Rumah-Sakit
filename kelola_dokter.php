<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);

// Ambil data dokter
$result = mysqli_query($conn, "SELECT * FROM dokter ORDER BY nama ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Kelola Dokter - Admin RS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
      padding: 2rem;
    }
    .container {
      max-width: 900px;
      margin: auto;
      background: white;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    h2 {
      color: #0d6efd;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }
    table {
      font-size: 0.95rem;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Jadwal Dokter</h2>
        <a href="admin_dashboard.php" class="btn btn-secondary">⬅ Kembali</a>
    </div>

  <?php if ($success): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <a href="tambah_dokter.php" class="btn btn-primary mb-3">+ Tambah Dokter</a>
  <table class="table table-bordered table-hover align-middle">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama Dokter</th>
        <th>Spesialis</th>
        <th>Hari Praktek</th>
        <th>Jam Praktek</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (mysqli_num_rows($result) === 0): ?>
        <tr><td colspan="6" class="text-center">Data dokter tidak ditemukan.</td></tr>
      <?php else: ?>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['spesialis']) ?></td>
            <td><?= htmlspecialchars($row['hari']) ?></td>
            <td><?= htmlspecialchars($row['jam']) ?></td>
            <td>
              <a href="edit_dokter.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="hapus_dokter.php?id=<?= $row['id'] ?>" 
                 onclick="return confirm('Yakin ingin menghapus dokter <?= htmlspecialchars(addslashes($row['nama'])) ?>?');" 
                 class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
