<?php
session_start();
include 'koneksi.php';

$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];
$role = $_POST['role'];

// Cek email sudah terdaftar?
$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    $_SESSION['error'] = "Email sudah digunakan!";
    header("Location: register.php");
    exit;
}

// Hash password
$pass_hash = password_hash($password, PASSWORD_DEFAULT);

// Insert user baru
$query = "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$pass_hash', '$role')";
if (mysqli_query($conn, $query)) {
    header("Location: login_user.php");
    exit;
} else {
    $_SESSION['error'] = "Registrasi gagal!";
    header("Location: register.php");
    exit;
}
?>
