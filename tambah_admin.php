<?php
include 'config.php';

$email = 'admin@rs.com';
$password_plain = 'admin123';
$password_hash = password_hash($password_plain, PASSWORD_DEFAULT);
$nama = 'Admin Rumah Sakit';

// Update jika email sudah ada
$cek = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    $update = mysqli_query($conn, "UPDATE admin SET password='$password_hash' WHERE email='$email'");
    echo $update ? "Password berhasil diperbarui.<br>Password baru: $password_plain" : "Gagal update password.";
} else {
    $insert = mysqli_query($conn, "INSERT INTO admin (email, password, nama_lengkap) VALUES ('$email', '$password_hash', '$nama')");
    echo $insert ? "Admin berhasil ditambahkan.<br>Password: $password_plain" : "Gagal tambah admin.";
}
?>
