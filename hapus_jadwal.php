<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $delete = mysqli_query($conn, "DELETE FROM jadwal_dokter WHERE id = $id");

    if ($delete) {
        $_SESSION['success'] = "Jadwal berhasil dihapus.";
    } else {
        $_SESSION['error'] = "Gagal menghapus jadwal.";
    }
}

header("Location: jadwal_dokter.php");
exit;
