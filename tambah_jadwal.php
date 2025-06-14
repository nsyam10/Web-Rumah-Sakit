<?php
session_start();
include 'koneksi.php';

// Cek login dan role admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dokter_id = intval($_POST['dokter_id']);
    $hari = trim($_POST['hari']);
    $jam_mulai = trim($_POST['jam_mulai']);
    $jam_selesai = trim($_POST['jam_selesai']);

    if (!$dokter_id || !$hari || !$jam_mulai || !$jam_selesai) {
        $error = "Semua field harus diisi.";
    } else {
        $stmt = $conn->prepare("INSERT INTO jadwal (dokter_id, hari, jam_mulai, jam_selesai) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $dokter_id, $hari, $jam_mulai, $jam_selesai);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Jadwal berhasil ditambahkan.";
            header("Location: kelola_jadwal.php");
            exit;
        } else {
            $error = "Gagal menambahkan jadwal: " . $conn->error;
        }
    }
}

// Ambil daftar dokter untuk dropdown
$dokterResult = $conn->query("SELECT id, nama FROM dokter ORDER BY nama");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Jadwal Dokter - Admin RS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Tambah Jadwal Dokter Baru</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="dokter_id" class="form-label">Pilih Dokter</label>
            <select name="dokter_id" id="dokter_id" class="form-select" required>
                <option value="">-- Pilih Dokter --</option>
                <?php while ($d = $dokterResult->fetch_assoc()): ?>
                    <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nama']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="hari" class="form-label">Hari Praktik</label>
            <input type="text" name="hari" id="hari" class="form-control" placeholder="Misal: Senin, Rabu, Jumat" required>
        </div>

        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jam_selesai" class="form-label">Jam Selesai</label>
            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Tambah Jadwal</button>
        <a href="kelola_jadwal.php" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
