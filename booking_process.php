<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_POST['user_id']);
    $jadwal_id = intval($_POST['jadwal_id']);
    $tanggal = $_POST['tanggal'];

    if ($user_id && $jadwal_id && $tanggal) {
        $stmt = $conn->prepare("INSERT INTO booking (user_id, jadwal_id, tanggal) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $user_id, $jadwal_id, $tanggal);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Booking berhasil disimpan.";
        } else {
            $_SESSION['error'] = "Gagal melakukan booking.";
        }
    } else {
        $_SESSION['error'] = "Semua field harus diisi.";
    }

    header("Location: booking.php");
    exit;
} else {
    header("Location: booking.php");
    exit;
}
