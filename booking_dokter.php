<?php
session_start();
include 'koneksi.php';

// Cek role user
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit;
}

// Cek parameter dokter_id
if (!isset($_GET['dokter_id'])) {
    echo "Dokter tidak dipilih.";
    exit;
}
$dokter_id = intval($_GET['dokter_id']);

// Ambil user_id dari session
if (!isset($_SESSION['user_id'])) {
    echo "User tidak ditemukan.";
    exit;
}
$user_id = $_SESSION['user_id'];

// Ambil data dokter
$dokter = mysqli_query($conn, "SELECT * FROM dokter WHERE id = $dokter_id");
$data = mysqli_fetch_assoc($dokter);

if (!$data) {
    echo "Dokter tidak ditemukan.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    mysqli_query($conn, "INSERT INTO booking (user_id, dokter_id, tanggal) VALUES ($user_id, $dokter_id, '$tanggal')");
    echo "<script>alert('Booking berhasil!'); window.location='riwayat_booking.php';</script>";
}

// Ambil jadwal dokter dari tabel jadwal
$jadwal_q = mysqli_query($conn, "SELECT hari, jam_mulai, jam_selesai FROM jadwal WHERE dokter_id = $dokter_id");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Booking Dokter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h3>Booking ke Dokter</h3>
  <div class="card mt-3 p-3">
    <h5>Dokter: <?= $data['nama'] ?> (<?= $data['spesialis'] ?>)</h5>
    <p><strong>Jadwal:</strong><br>
        <?php while($j = mysqli_fetch_assoc($jadwal_q)): ?>
            <?= htmlspecialchars($j['hari']) ?>, <?= htmlspecialchars($j['jam_mulai']) ?> - <?= htmlspecialchars($j['jam_selesai']) ?><br>
        <?php endwhile; ?>
    </p>

    <form method="post">
      <div class="mb-2">
        <label>Tanggal Kunjungan</label>
        <input type="date" name="tanggal" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Booking</button>
      <a href="daftar_dokter.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
