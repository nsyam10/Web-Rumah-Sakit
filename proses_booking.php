<?php
session_start();
include 'koneksi.php';

$user_id = $_SESSION['user_id'];
$jadwal_id = $_POST['jadwal_id'];
$tanggal = $_POST['tanggal'];

mysqli_query($conn, "INSERT INTO booking (user_id, jadwal_id, tanggal) VALUES ('$user_id', '$jadwal_id', '$tanggal')");
echo "<script>alert('Booking berhasil!'); location.href='user_dashboard.php';</script>";
?>
