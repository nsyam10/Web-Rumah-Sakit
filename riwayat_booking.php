<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login dan role-nya user
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data riwayat booking berdasarkan user_id
$query = mysqli_query($conn, "
    SELECT b.id, d.nama AS nama_dokter, d.spesialis, j.hari, j.jam_mulai, j.jam_selesai, b.tanggal, b.status
    FROM booking b
    JOIN jadwal j ON b.jadwal_id = j.id
    JOIN dokter d ON j.dokter_id = d.id
    WHERE b.user_id = $user_id
    ORDER BY b.tanggal DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahan ikon Bootstrap -->
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
    <h3 class="mb-4">Riwayat Janji Temu</h3>

    <a href="user_dashboard.php" class="btn-kembali mb-3">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <?php if (mysqli_num_rows($query) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Dokter</th>
                        <th>Spesialis</th>
                        <th>Hari & Jam</th>
                        <th>Tanggal Janji</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama_dokter']) ?></td>
                        <td><?= htmlspecialchars($row['spesialis']) ?></td>
                        <td><?= htmlspecialchars($row['hari'] . ' (' . $row['jam_mulai'] . ' - ' . $row['jam_selesai'] . ')') ?></td>
                        <td><?= htmlspecialchars($row['tanggal']) ?></td>
                        <td>
                            <?php if ($row['status'] == 'Menunggu'): ?>
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            <?php elseif ($row['status'] == 'Diterima'): ?>
                                <span class="badge bg-success">Diterima</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Ditolak</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="cetak_bukti.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-secondary" target="_blank">
                                <i class="bi bi-printer"></i> Cetak
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">Belum ada riwayat booking.</div>
    <?php endif; ?>
</div>
</body>
</html>
