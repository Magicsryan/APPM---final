<?php
$id = $_GET['id'];
if (empty($id)) {
  header("Location:petugas.php");
  exit; // it's a good practice to exit after a header redirection
}
include '../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_array($query);
?>

<div class="card shadow">
  <div class="card-header">
    <a href="?url=verifikasi-pengaduan" class="btn btn-primary btn-iconsplit">
      <span class="icon text-white-50">
        <i class="fa fa-arrow-left"></i>
      </span>
      <span class="text">Kembali</span>
    </a>
  </div>
  <div class="card-body">
    <form method="post" action="proses.php" enctype="multipart/form-data">
      <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan']; ?>">
      <div class="form-group">
        <label style="font-size: 14px;">Tgl Pengaduan</label>
        <input type="text" name="tgl_pengaduan" class="form-control" readonly value="<?= $data['Tgl_pengaduan']; ?>">
      </div>
      <div class="form-group">
        <label style="font-size: 14px;">Isi Laporan</label>
        <textarea name="isi_laporan" class="form-control" required><?= $data['isi_laporan']; ?></textarea>
      </div>
      <div class="form-group">
        <label style="font-size: 14px;">Foto</label>
        <img class="img-thumbnail" src="../foto/<?= $data['foto'] ?>" width="150">
      </div>
    </form>
  </div>