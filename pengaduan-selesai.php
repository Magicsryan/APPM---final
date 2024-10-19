<?php
$id = $_GET['id'];
if (empty($id)) {
    header("Location:masyarakat.php");
    exit; // good practice to exit after a header redirection
}

include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_array($query);
?>

<div class="card shadow">
    <div class="card-header">
        <a href="?url=lihat-pengaduan" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <h5>Konfirmasi Selesai Pengaduan</h5>
        <p>Apakah Anda yakin ingin menandai laporan ini sebagai <strong>selesai</strong>?</p>

        <form method="post" action="proses-selesai.php" enctype="multipart/form-data">
            <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan']; ?>">

            <div class="form-group">
                <label style="font-size: 14px;">Tgl Pengaduan</label>
                <input type="text" name="tgl_pengaduan" class="form-control" readonly value="<?= $data['Tgl_pengaduan']; ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 14px;">Isi Laporan</label>
                <textarea name="isi_laporan" class="form-control" readonly><?= $data['isi_laporan']; ?></textarea>
            </div>
            <div class="form-group">
                <label style="font-size: 14px;">Foto</label>
                <img class="img-thumbnail" src="foto/<?= $data['foto'] ?>" width="300">
            </div>

            <!-- Button to confirm marking the report as selesai -->
            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-check"></i>
                </span>
                <span class="text">Selesai</span>
            </button>
        </form>
    </div>
</div>