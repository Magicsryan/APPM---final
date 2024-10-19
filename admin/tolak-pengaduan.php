<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id_pengaduan = $_GET['id'];
    
    // Update the status to "ditolak"
    $sql = "UPDATE pengaduan SET status = 'ditolak' WHERE id_pengaduan = '$id_pengaduan'";
    
    if (mysqli_query($koneksi, $sql)) {
        // Redirect back to the table with a success message
        echo"<script>alert('Pengaduan Sudah Ditolak '); window.location.assign('admin.php?url=lihat-pengaduan'); </script>"; 
    }
        else{ 
            echo"<script>alert('Pengaduan Gagal Ditolak '); window.location.assign('admin.php?url=lihat-pengaduan'); </script>";
        }
}
?>
