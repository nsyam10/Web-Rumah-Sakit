<?php
session_start();
include 'koneksi.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['admin'] = $data['email'];
    $_SESSION['role'] = 'admin';
    $_SESSION['nama'] = $data['nama_lengkap']; // ganti sesuai nama kolom di database
    header("Location: admin_dashboard.php");
    exit;
}

if (!$data) {
    $_SESSION['error'] = "Email tidak ditemukan";
    header("Location: login_admin.php");
    exit;
} else {
    $_SESSION['error'] = "Password salah";
    header("Location: login_admin.php");
    exit;
}





