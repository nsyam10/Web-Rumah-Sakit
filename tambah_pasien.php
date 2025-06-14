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
    $nama = trim($_POST['nama']);
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $alamat = trim($_POST['alamat']);
    $telepon = trim($_POST['telepon']);

    if (!$nama || !$jenis_kelamin || !$alamat || !$telepon) {
        $error = 'Semua field harus diisi.';
    } else {
        $stmt = $conn->prepare("INSERT INTO pasien (nama, jenis_kelamin, alamat, telepon) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $telepon);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Pasien '$nama' berhasil ditambahkan.";
            header("Location: kelola_pasien.php");
            exit;
        } else {
            $error = "Gagal menambahkan pasien: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Tambah Pasien - Admin RS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Tambah Pasien Baru</h2>

  <?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Pasien</label>
      <input type="text" id="nama" name="nama" class="form-control" required value="<?= isset($nama) ? htmlspecialchars($nama) : '' ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Jenis Kelamin</label><br />
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="Laki-laki" <?= (isset($jenis_kelamin) && $jenis_kelamin == 'Laki-laki') ? 'checked' : '' ?> required>
        <label class="form-check-label" for="lk">Laki-laki</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="Perempuan" <?= (isset($jenis_kelamin) && $jenis_kelamin == 'Perempuan') ? 'checked' : '' ?> required>
        <label class="form-check-label" for="pr">Perempuan</label>
      </div>
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea id="alamat" name="alamat" class="form-control" required><?= isset($alamat) ? htmlspecialchars($alamat) : '' ?></textarea>
    </div>

    <div class="mb-3">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="tel" id="telepon" name="telepon" class="form-control" required value="<?= isset($telepon) ? htmlspecialchars($telepon) : '' ?>">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="kelola_pasien.php" class="btn btn-secondary ms-2">Batal</a>
  </form>
</div>
</body>
</html>
