<?php
session_start();
include '../koneksi.php';
$id_pengaduan=$_POST['id'];
$Tgl_pengaduan = $_POST['tgl_pengaduan'];
$tanggapan=$_POST['tanggapan_laporan'];
$tgl_tanggapan= date('d-y-t');
$sql = "INSERT INTO tanggapan VALUES('$tanggapan','$id_pengaduan','$tgl_tanggapan','$tanggapan')";
mysqli_query($koneksi, $sql);
$sql1 = "update pengaduan set status='proses' where id_pengaduan = $id_pengaduan";
mysqli_query($koneksi,$sql1);
header('location:admin.php?url=lihat-tanggapan');
?>