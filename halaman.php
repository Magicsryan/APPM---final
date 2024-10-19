<?php

if (isset($_GET['url'])) {
    switch ($_GET['url']) {
        case 'tulis-pengaduan':
            include 'tulis-pengaduan.php';
            break;

        case 'lihat-pengaduan':
            include 'lihat-pengaduan.php';
            break;

        case 'verifikasi-pengaduan':
            include 'verifikasi-pengaduan.php';
            break;

        case 'lihat-tanggapan':
            include 'lihat-tanggapan.php';
            break;

        case 'pengaduan-selesai':
            include 'pengaduan-selesai.php';
            break;

        default:
            echo "Halaman Tidak Ditemukan";
            break;
    }
} else {
    echo "Selamat Datang Di Aplikasi Pelaporan Pengaduan Masyarakat, Dimana Aplikasi ini dibuat untuk melaporkan tindakan yang menyimpang dari ketentuan.<br><br>";
}
echo "Anda Login Sebagai Masyarakat Atas Nama : " . $_SESSION['nama'];
