<?php
session_start();
include 'koneksi.php';

// Cek login admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Proses hapus data pasien
if (isset($_GET['hapus'])) {
    $id_hapus = intval($_GET['hapus']);
    $delete = mysqli_query($conn, "DELETE FROM pasien WHERE id = $id_hapus");
    $_SESSION[ $delete ? 'success' : 'error' ] = $delete
        ? "Data pasien berhasil dihapus."
        : "Gagal menghapus data pasien: " . mysqli_error($conn);
    header("Location: kelola_pasien.php");
    exit;
}

// Ambil data pasien
$result = mysqli_query($conn, "SELECT * FROM pasien ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Kelola Pasien - Admin RS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Data Pasien</h2>
        <a href="admin_dashboard.php" class="btn btn-secondary">⬅ Kembali</a>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <a href="tambah_pasien.php" class="btn btn-primary mb-3">+ Tambah Pasien Baru</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg-white align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0): ?>
                    <?php $no = 1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
                            <td><?= htmlspecialchars($row['alamat']); ?></td>
                            <td><?= htmlspecialchars($row['telepon']); ?></td>
                            <td>
                                <a href="edit_pasien.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="kelola_pasien.php?hapus=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pasien ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data pasien.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
