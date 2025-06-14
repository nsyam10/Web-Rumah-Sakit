<?php
session_start();
include 'koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$aksi = $_GET['aksi'];

$status = $aksi == 'konfirmasi' ? 'Dikonfirmasi' : 'Selesai';
if ($aksi == 'tolak') $status = 'Selesai'; // Bisa diganti jadi 'Ditolak' kalau ingin ada status lebih rinci

mysqli_query($conn, "UPDATE booking SET status='$status' WHERE id=$id");
header("Location: booking_admin.php");
?>
