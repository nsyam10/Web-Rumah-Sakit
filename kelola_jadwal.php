<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_admin.php");
    exit;
}

// Hapus data jika ada parameter delete_id
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM jadwal WHERE id = $delete_id");
    $_SESSION['success'] = "Jadwal berhasil dihapus.";
    header("Location: kelola_jadwal.php");
    exit;
}

// Ambil data jadwal dengan join dokter
$query = $conn->query("SELECT jadwal.id, dokter.nama AS dokter_nama, jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai 
                       FROM jadwal 
                       JOIN dokter ON jadwal.dokter_id = dokter.id
                       ORDER BY dokter.nama, jadwal.hari, jadwal.jam_mulai");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Kelola Jadwal Dokter - Admin RS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Jadwal Dokter</h2>
        <a href="admin_dashboard.php" class="btn btn-secondary">⬅ Kembali</a>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <a href="tambah_jadwal.php" class="btn btn-primary mb-3">Tambah Jadwal</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Hari Praktik</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($query->num_rows > 0): ?>
            <?php $no = 1; ?>
            <?php while ($row = $query->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['dokter_nama']) ?></td>
                <td><?= htmlspecialchars($row['hari']) ?></td>
                <td><?= htmlspecialchars($row['jam_mulai']) ?></td>
                <td><?= htmlspecialchars($row['jam_selesai']) ?></td>
                <td>
                    <a href="edit_jadwal.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="kelola_jadwal.php?delete_id=<?= $row['id'] ?>" 
                       onclick="return confirm('Yakin ingin menghapus jadwal ini?')" 
                       class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6" class="text-center">Belum ada data jadwal.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
