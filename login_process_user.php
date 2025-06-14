<?php
session_start();
include 'koneksi.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($query);

if ($user) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        $_SESSION['nama_user'] = $user['nama'];
        $_SESSION['user_id'] = $user['id']; // Tambahkan baris ini
        $_SESSION['role'] = 'user';
        header("Location: user_dashboard.php");
        exit;
    } else {
        $_SESSION['error'] = "Password salah";
        header("Location: login_user.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Email tidak ditemukan";
    header("Location: login_user.php");
    exit;
}
?>
