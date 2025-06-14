<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login dan role admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Cek apakah ada parameter id dokter
if (!isset($_GET['id'])) {
    header("Location: kelola_dokter.php");
    exit;
}

$id = intval($_GET['id']);

// Ambil data dokter dari database
$query = mysqli_query($conn, "SELECT * FROM dokter WHERE id = $id");
if (mysqli_num_rows($query) == 0) {
    echo "Data dokter tidak ditemukan.";
    exit;
}
$dokter = mysqli_fetch_assoc($query);

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $spesialis = mysqli_real_escape_string($conn, $_POST['spesialis']);
    $hari = mysqli_real_escape_string($conn, $_POST['hari']);
    $jam = mysqli_real_escape_string($conn, $_POST['jam']);

    $update = mysqli_query($conn, "UPDATE dokter SET 
    nama = '$nama',
    spesialis = '$spesialis',
    hari = '$hari',
    jam = '$jam'
    WHERE id = $id");


    if ($update) {
        $_SESSION['success'] = "Data dokter berhasil diperbarui.";
        header("Location: kelola_dokter.php");
        exit;
    } else {
        $error = "Gagal memperbarui data dokter: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Dokter - RS Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Edit Data Dokter</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" class="form-control" id="nama" name="nama" required value="<?= htmlspecialchars($dokter['nama']) ?>">
        </div>

        <div class="mb-3">
            <label for="spesialis" class="form-label">Spesialis</label>
            <input type="text" class="form-control" id="spesialis" name="spesialis" required value="<?= htmlspecialchars($dokter['spesialis']) ?>">
        </div>

        <div class="mb-3">
    <label for="hari" class="form-label">Hari Praktik</label>
    <input type="text" class="form-control" id="hari" name="hari" placeholder="Misal: Senin, Rabu, Jumat" required value="<?= htmlspecialchars($dokter['hari']) ?>">
</div>

<div class="mb-3">
    <label for="jam" class="form-label">Jadwal Praktik</label>
    <input type="text" class="form-control" id="jam" name="jam" placeholder="Misal: 09:00 - 15:00" required value="<?= htmlspecialchars($dokter['jam']) ?>">
</div>


        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="kelola_dokter.php" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
