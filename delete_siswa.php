<?php
include 'includes/db_connect.php'; // Menghubungkan ke database
<link rel="stylesheet" href="assets/style.css">

// Proses hapus data siswa berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM siswa
