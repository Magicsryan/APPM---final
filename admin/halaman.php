<?php
if (isset($_GET['url'])) {
	switch ($_GET['url']) {
		case 'verifikasi-pengaduan';
			include 'verifikasi-pengaduan.php';
			break;

		case 'lihat-tanggapan':
			include 'lihat-tanggapan.php';
			break;

		case 'detail-pengaduan':
			include 'detail-pengaduan.php';
			break;

		case 'delete':
			include 'delete.php';
			break;

		case 'generate':
			include 'generate.php';
			break;

		default:
			echo "Halaman Tidak Ditemukan";
			break;
	}
} else {
	echo "Selamat Datang Di Aplikasi Pengaduan Masyarakat Dimana Aplikasi Ini Dibuat Untuk Melaporkan Tindakan Yang Menyimpang Dari Ketentuan.<br>";
	echo "Anda Login Sebagai Admin Atas Nama :  " . $_SESSION['nama_petugas'];
}
