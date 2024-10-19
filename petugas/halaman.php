<?php
if (isset($_GET['url'])) {
    switch ($_GET['url']) {

        case 'verifikasi-pengaduan':
            include 'verifikasi-pengaduan.php';
            break;

        case 'detail-pengaduan':
            include 'detail-pengaduan.php';
            break;

        case 'lihat-pengaduan':
            include 'lihat-pengaduan.php';
            break;

        case 'tanggapan':
            include 'tanggapan.php';
            break;

        default:
            echo "Halaman Tidak Ditemukan";
            break;
    }
} else {
    echo "Selamat Datang Di Aplikasi Pelaporan Pengaduan Masyarakat, Dimana Aplikasi ini dibuat untuk melaporkan tindakan yang menyimpang dari ketentuan.<br><br>";
}
echo "Anda Login Sebagai Petugas Atas Nama : " . $_SESSION['nama_petugas'];
