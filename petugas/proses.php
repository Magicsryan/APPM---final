<?php
include '../koneksi.php';

// Check if the required POST parameter 'id_pengaduan' is set
if (isset($_POST['id_pengaduan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $tanggapan = isset($_POST['tanggapan']) ? $_POST['tanggapan'] : ''; // Default to an empty string if not set

    // Validate and sanitize input
    $id_pengaduan = mysqli_real_escape_string($koneksi, $id_pengaduan);
    $tanggapan = mysqli_real_escape_string($koneksi, $tanggapan);

    // Check if the 'id_pengaduan' variable is set and not empty
    if (!empty($id_pengaduan)) {
        // Update the status and optionally insert the response
        $updateStatusQuery = "UPDATE pengaduan SET status = 'proses' WHERE id_pengaduan = '$id_pengaduan'";

        // Execute the update query
        if (mysqli_query($koneksi, $updateStatusQuery)) {
            // Insert the response if provided
            if (!empty($tanggapan)) {
                $insertTanggapanQuery = "INSERT INTO tanggapan (id_pengaduan, tanggapan, tgl_tanggapan) VALUES ('$id_pengaduan', '$tanggapan', NOW())";
                mysqli_query($koneksi, $insertTanggapanQuery);
            }

            // Redirect or display a success message
            echo "<script>alert('Laporan Berhasil Ditanggapi.'); window.location.assign('petugas.php');</script>";
            exit;
        } else {
            // Handle query error
            echo "<script>alert('Laporan Gagal Ditanggapi.); window.location.assign('petugas.php');</script>";
        }
    } else {
        // Handle missing data
        echo "<script>alert('Laporan Gagal Ditanggapi.'); window.location.assign('petugas.php');</script>";
    }
} else {
    // Handle case where POST parameter 'id_pengaduan' is not set
    die("Required POST parameter 'id_pengaduan' is not set.");
}
