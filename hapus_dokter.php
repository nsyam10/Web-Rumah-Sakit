<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: kelola_dokter.php");
    exit;
}

$id = (int) $_GET['id'];

// Hapus data dokter berdasarkan id
$query = "DELETE FROM dokter WHERE id = $id";
if (mysqli_query($conn, $query)) {
    $_SESSION['success'] = "Data dokter berhasil dihapus.";
} else {
    $_SESSION['error'] = "Gagal menghapus data dokter: " . mysqli_error($conn);
}

header("Location: kelola_dokter.php");
exit;
