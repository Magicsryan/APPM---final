<?php
include '../koneksi.php';

// Check if action and id are set
if (isset($_GET['action']) && $_GET['action'] === 'tolak' && isset($_GET['id'])) {
    $id_pengaduan = $_GET['id'];

    // Sanitize input
    $id_pengaduan = mysqli_real_escape_string($koneksi, $id_pengaduan);

    // Prepare and execute SQL statements
    $update_status_sql = "UPDATE pengaduan SET status = 'ditolak' WHERE id_pengaduan = ?";
    $insert_tanggapan_sql = "INSERT INTO tanggapan (id_pengaduan, tanggapan, tgl_tanggapan) VALUES (?, 'Laporan ditolak', ?)";

    if ($stmt = mysqli_prepare($koneksi, $update_status_sql)) {
        mysqli_stmt_bind_param($stmt, 'i', $id_pengaduan);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);

            if ($stmt = mysqli_prepare($koneksi, $insert_tanggapan_sql)) {
                $tgl_tanggapan = date('Y-m-d'); // Capture the current date
                mysqli_stmt_bind_param($stmt, 'is', $id_pengaduan, $tgl_tanggapan);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_close($stmt);
                    header("Location: admin.php?url=verifikasi-pengaduan&message=success");
                    exit;
                } else {
                    mysqli_stmt_close($stmt);
                    header("Location: admin.php?url=verifikasi-pengaduan&message=insert_error");
                    exit;
                }
            } else {
                header("Location: admin.php?url=verifikasi-pengaduan&message=prepare_error");
                exit;
            }
        } else {
            mysqli_stmt_close($stmt);
            header("Location: admin.php?url=verifikasi-pengaduan&message=status_update_error");
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
