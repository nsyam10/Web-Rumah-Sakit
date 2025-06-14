<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login_user.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
$success = "";
$error = "";

// Ambil data user saat ini
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
$user = mysqli_fetch_assoc($query);

if (!$user) {
    echo "User tidak ditemukan.";
    exit;
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password_baru = trim($_POST['password']);

    if ($nama == "" || $email == "") {
        $error = "Nama dan email wajib diisi.";
    } else {
        // Jika password tidak kosong, update password juga
        if (!empty($password_baru)) {
            $hash = password_hash($password_baru, PASSWORD_DEFAULT);
            $update = mysqli_query($conn, "UPDATE users SET nama='$nama', email='$email', password='$hash' WHERE id=$user_id");
        } else {
            $update = mysqli_query($conn, "UPDATE users SET nama='$nama', email='$email' WHERE id=$user_id");
        }

        if ($update) {
            $_SESSION['nama'] = $nama; // Update nama di session juga
            $success = "Profil berhasil diperbarui.";
        } else {
            $error = "Gagal memperbarui profil.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Edit Profil</h3>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($user['nama']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru (opsional)</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= $role === 'admin' ? 'admin_dashboard.php' : 'user_dashboard.php' ?>" class="btn btn-secondary ms-2">Kembali</a>
    </form>
</div>
</body>
</html>
