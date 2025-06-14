<?php
session_start();
include 'koneksi.php';

// Cek login dan pastikan role adalah user
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

// Pastikan parameter ID booking tersedia
if (!isset($_GET['id'])) {
    echo "ID booking tidak ditemukan.";
    exit;
}

$booking_id = intval($_GET['id']);
$user_id = $_SESSION['user_id'];

// Ambil data booking
$query = mysqli_query($conn, "
    SELECT b.id, u.nama AS nama_user, u.email, d.nama AS nama_dokter, d.spesialis,
           j.hari, j.jam_mulai, j.jam_selesai, b.tanggal, b.status
    FROM booking b
    JOIN users u ON b.user_id = u.id
    JOIN jadwal j ON b.jadwal_id = j.id
    JOIN dokter d ON j.dokter_id = d.id
    WHERE b.id = $booking_id AND b.user_id = $user_id
");

if (mysqli_num_rows($query) === 0) {
    echo "Data booking tidak ditemukan atau bukan milik Anda.";
    exit;
}

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Bukti Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        body {
            background: #fff;
            padding: 40px;
        }

        .header {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .footer {
            border-top: 1px solid #ccc;
            margin-top: 40px;
            padding-top: 10px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header text-center">
        <h2 class="text-primary">Bukti Booking Janji Temu</h2>
        <p>Rumah Sakit Bersama</p>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nama Pasien</th>
            <td><?= htmlspecialchars($data['nama_user']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <th>Dokter</th>
            <td><?= htmlspecialchars($data['nama_dokter']) . " (" . $data['spesialis'] . ")" ?></td>
        </tr>
        <tr>
            <th>Hari & Jam</th>
            <td><?= htmlspecialchars($data['hari']) ?> (<?= $data['jam_mulai'] ?> - <?= $data['jam_selesai'] ?>)</td>
        </tr>
        <tr>
            <th>Tanggal Janji Temu</th>
            <td><?= htmlspecialchars($data['tanggal']) ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <?php if ($data['status'] === 'Menunggu'): ?>
                    <span class="badge bg-warning text-dark">Menunggu</span>
                <?php elseif ($data['status'] === 'Diterima'): ?>
                    <span class="badge bg-success">Diterima</span>
                <?php else: ?>
                    <span class="badge bg-danger">Ditolak</span>
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <div class="footer text-center mt-5">
        <p>Dicetak pada: <?= date('d-m-Y H:i') ?></p>
    </div>

    <div class="text-center no-print mt-4">
        <button onclick="window.print()" class="btn btn-primary"><i class="bi bi-printer"></i> Cetak</button>
        <a href="riwayat_booking.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
