<?php
include '../koneksi.php';

// Check if id is set
if (isset($_GET['id'])) {
    $id_pengaduan = $_GET['id'];

    // Sanitize input
    $id_pengaduan = mysqli_real_escape_string($koneksi, $id_pengaduan);

    // Prepare and execute SQL statements
    $delete_tanggapan_sql = "DELETE FROM tanggapan WHERE id_pengaduan = ?";
    $delete_pengaduan_sql = "DELETE FROM pengaduan WHERE id_pengaduan = ?";

    if ($stmt = mysqli_prepare($koneksi, $delete_tanggapan_sql)) {
        mysqli_stmt_bind_param($stmt, 'i', $id_pengaduan);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    if ($stmt = mysqli_prepare($koneksi, $delete_pengaduan_sql)) {
        mysqli_stmt_bind_param($stmt, 'i', $id_pengaduan);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: admin.php?url=verifikasi-pengaduan&message=success");
            exit;
        } else {
            mysqli_stmt_close($stmt);
            header("Location: admin.php?url=verifikasi-pengaduan&message=delete_error");
            exit;
        }
    } else {
        header("Location: admin.php?url=verifikasi-pengaduan&message=prepare_error");
        exit;
    }
} else {
    header("Location: admin.php?url=verifikasi-pengaduan&message=invalid_parameters");
    exit;
}

mysqli_close($koneksi);
