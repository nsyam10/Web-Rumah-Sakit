<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $spesialis = trim($_POST['spesialis']);
    $hari = trim($_POST['hari']);
    $jam = trim($_POST['jam']);

    if (!$nama || !$spesialis || !$hari || !$jam) {
        $error = 'Semua field harus diisi.';
    } else {
        // Insert ke database
        $stmt = $conn->prepare("INSERT INTO dokter (nama, spesialis, hari, jam) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $spesialis, $hari, $jam);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Dokter '$nama' berhasil ditambahkan.";
            header("Location: kelola_dokter.php");
            exit;
        } else {
            $error = "Gagal menambahkan dokter: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Tambah Dokter - Admin RS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
      padding: 2rem;
    }
    .container {
      max-width: 600px;
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
  </style>
</head>
<body>

<div class="container">
  <h2>Tambah Dokter Baru</h2>

  <?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Dokter</label>
      <input type="text" name="nama" id="nama" class="form-control" required value="<?= isset($nama) ? htmlspecialchars($nama) : '' ?>">
    </div>
    <div class="mb-3">
      <label for="spesialis" class="form-label">Spesialis</label>
      <input type="text" name="spesialis" id="spesialis" class="form-control" required value="<?= isset($spesialis) ? htmlspecialchars($spesialis) : '' ?>">
    </div>
    <div class="mb-3">
      <label for="hari" class="form-label">Hari Praktek</label>
      <input type="text" name="hari" id="hari" class="form-control" placeholder="Misal: Senin, Rabu, Jumat" required value="<?= isset($hari) ? htmlspecialchars($hari) : '' ?>">
    </div>
    <div class="mb-3">
      <label for="jam" class="form-label">Jam Praktek</label>
      <input type="text" name="jam" id="jam" class="form-control" placeholder="Misal: 09:00 - 15:00" required value="<?= isset($jam) ? htmlspecialchars($jam) : '' ?>">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="kelola_dokter.php" class="btn btn-secondary ms-2">Batal</a>
  </form>
</div>

</body>
</html>
