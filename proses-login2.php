<?php
session_start();
include 'koneksi.php';

// Cek jika ada sesi yang sudah ada
if (isset($_SESSION['username'])) {
    header("Location: " . ($_SESSION['level'] == 'admin' ? 'admin/admin.php' : 'petugas/petugas.php'));
    exit();
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$nik = $_POST['nik'];
$remember = isset($_POST['remember']); // Ambil status checkbox remember me

$sql = "SELECT * FROM petugas WHERE username='$username' AND password= '$password'";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_array($query);
    $_SESSION['nama_petugas'] = $data['nama_petugas'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['nik'] = $data['nik'];
    $_SESSION['level'] = $data['level'];

    // Jika remember me dicentang, set cookie
    if ($remember) {
        setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie berlaku 30 hari
        setcookie('nik', $nik, time() + (86400 * 30), "/"); // Cookie berlaku 30 hari
    } else {
        // Jika tidak dicentang, hapus cookie
        setcookie('username', '', time() - 3600, "/");
        setcookie('nik', '', time() - 3600, "/");
    }

    // Arahkan ke halaman sesuai level
    if ($data['level'] == "admin") {
        header("location:admin/admin.php");
    } elseif ($data['level'] == "petugas") {
        header("location:petugas/petugas.php");
    }
} else {
    echo "<script>alert('Maaf Anda Gagal Login'); window.location.assign('index.php'); </script>";
}
