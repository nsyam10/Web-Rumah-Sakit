<?php
session_start();
include 'koneksi.php';

// Cek login dan pastikan role adalah 'user' (pasien)
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data jadwal dokter
$query = mysqli_query($conn, "
    SELECT j.id AS jadwal_id, d.nama, d.spesialis, j.hari, j.jam_mulai, j.jam_selesai
    FROM jadwal j
    JOIN dokter d ON j.dokter_id = d.id
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Janji Temu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <h3 class="mb-4">Form Booking Janji Temu</h3>
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php elseif (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

    <a href="user_dashboard.php" class="btn-kembali mb-3">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <form action="booking_process.php" method="POST">
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">

    <div class="mb-3">
        <label for="jadwal_id" class="form-label">Pilih Jadwal Dokter</label>
        <select name="jadwal_id" id="jadwal_id" class="form-select" required>
            <option value="">-- Pilih Jadwal --</option>
            <?php while ($row = mysqli_fetch_assoc($query)): ?>
                <option value="<?= $row['jadwal_id'] ?>">
                    <?= htmlspecialchars($row['nama'] . " (" . $row['spesialis'] . ") - " . $row['hari'] . " " . $row['jam_mulai'] . " - " . $row['jam_selesai']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
        <select name="jenis_layanan" id="jenis_layanan" class="form-select" required onchange="toggleNoBpjs()">
            <option value="">-- Pilih Jenis Layanan --</option>
            <option value="bpjs">BPJS</option>
            <option value="nonbpjs">Non BPJS</option>
        </select>
    </div>

    <div class="mb-3" id="no_bpjs_div" style="display:none;">
        <label for="no_bpjs" class="form-label">No. BPJS</label>
        <input type="text" name="no_bpjs" id="no_bpjs" class="form-control" placeholder="Masukkan No. BPJS">
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal Janji</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Booking Sekarang</button>
</form>

<script>
function toggleNoBpjs() {
    const jenis = document.getElementById('jenis_layanan').value;
    const noBpjsDiv = document.getElementById('no_bpjs_div');
    const noBpjsInput = document.getElementById('no_bpjs');
    if (jenis === 'bpjs') {
        noBpjsDiv.style.display = 'block';
        noBpjsInput.setAttribute('required', 'required');
    } else {
        noBpjsDiv.style.display = 'none';
        noBpjsInput.removeAttribute('required');
        noBpjsInput.value = '';
    }
}
</script>


</div>
</body>
</html>
