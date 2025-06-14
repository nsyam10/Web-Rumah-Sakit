<?php
session_start();
include 'koneksi.php';

// Pastikan hanya admin yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Proses konfirmasi status booking
if (isset($_GET['konfirmasi']) && isset($_GET['id'])) {
    $status = $_GET['konfirmasi'];
    $id = intval($_GET['id']);

    if (in_array($status, ['Diterima', 'Ditolak'])) {
        $update = mysqli_query($conn, "UPDATE booking SET status='$status' WHERE id=$id");

        if ($status === 'Diterima' && $update) {
            // Ambil data booking dan user terkait
            $getBooking = mysqli_query($conn, "
                SELECT u.nama, u.jenis_kelamin, u.alamat, u.telepon
                FROM booking b
                JOIN users u ON b.user_id = u.id
                WHERE b.id = $id
            ");

            if ($row = mysqli_fetch_assoc($getBooking)) {
                // Cek apakah data sudah ada di tabel pasien
                $nama_escaped = mysqli_real_escape_string($conn, $row['nama']);
                $telepon_escaped = mysqli_real_escape_string($conn, $row['telepon']);
                $cek = mysqli_query($conn, "SELECT * FROM pasien WHERE nama='$nama_escaped' AND telepon='$telepon_escaped'");

                if (mysqli_num_rows($cek) == 0) {
                    // Masukkan data pasien
                    $jenis_kelamin_escaped = mysqli_real_escape_string($conn, $row['jenis_kelamin']);
                    $alamat_escaped = mysqli_real_escape_string($conn, $row['alamat']);
                    mysqli_query($conn, "
                        INSERT INTO pasien (nama, jenis_kelamin, alamat, telepon)
                        VALUES (
                            '$nama_escaped',
                            '$jenis_kelamin_escaped',
                            '$alamat_escaped',
                            '$telepon_escaped'
                        )
                    ");
                }
            }
        }

        $_SESSION['notif'] = $update ? "Status berhasil diperbarui dan pasien ditambahkan (jika belum ada)." : "Gagal memperbarui status.";
        header("Location: kelola_booking.php");
        exit;
    }
}

// Ambil data booking lengkap
$query = mysqli_query($conn, "
    SELECT b.id, u.nama AS nama_user, d.nama AS nama_dokter, d.spesialis, 
           j.hari, j.jam_mulai, j.jam_selesai,
           b.tanggal, b.jenis_layanan, b.status
    FROM booking b
    JOIN users u ON b.user_id = u.id
    JOIN jadwal j ON b.jadwal_id = j.id
    JOIN dokter d ON j.dokter_id = d.id
    ORDER BY b.tanggal DESC
");
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Booking Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Kelola Booking Pasien</h3>
        <a href="admin_dashboard.php" class="btn btn-secondary">⬅ Kembali</a>
    </div>

    <?php if (isset($_SESSION['notif'])): ?>
        <div class="alert alert-info text-center"><?= htmlspecialchars($_SESSION['notif']); unset($_SESSION['notif']); ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Spesialis</th>
                    <th>Hari & Jam</th>
                    <th>Tanggal</th>
                    <th>Jenis Layanan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama_user']) ?></td>
                        <td><?= htmlspecialchars($row['nama_dokter']) ?></td>
                        <td><?= htmlspecialchars($row['spesialis']) ?></td>
                        <td><?= $row['hari'] . '<br><small>(' . $row['jam_mulai'] . ' - ' . $row['jam_selesai'] . ')</small>' ?></td>
                        <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                        <td>
                            <span class="badge bg-secondary"><?= strtoupper(htmlspecialchars($row['jenis_layanan'])) ?></span>
                        </td>
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
                            <?php if ($row['status'] == 'Menunggu'): ?>
                                <a href="?konfirmasi=Diterima&id=<?= $row['id'] ?>" class="btn btn-sm btn-success mb-1" onclick="return confirm('Terima booking ini?')">✔ Terima</a><br>
                                <a href="?konfirmasi=Ditolak&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tolak booking ini?')">✘ Tolak</a>
                            <?php else: ?>
                                <span class="text-muted">Terkonfirmasi</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
