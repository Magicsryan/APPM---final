<?php

$id = $_GET['id'];
if (empty($id)) {
    header("Location:masyarakat.php");
    exit; // it's a good practice to exit after a header redirection
}

include 'koneksi.php';

// Fetch both the complaint and its response based on the complaint ID
$query = mysqli_query($koneksi, "SELECT * FROM pengaduan LEFT JOIN tanggapan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan WHERE pengaduan.id_pengaduan='$id'");

if (mysqli_num_rows($query) == 0) {
    echo "<script>alert('Data tidak ditemukan'); window.location.assign('masyarakat.php?url=lihat-tanggapan.php');</script>";
} else {
    $data = mysqli_fetch_array($query);

    // Check if the status is 'ditolak', which means the complaint was rejected
    if ($data['status'] == 'ditolak') {
        echo "<script>alert('Pengaduan Ditolak'); window.location.assign('masyarakat.php?url=lihat-tanggapan.php');</script>";
    }
}
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
        <form method="post" action="proses-pengaduan.php" enctype="multipart/form-data">
            <div class="form-group">
                <label style="font-size: 14px;">Tgl Pengaduan</label>
                <input type="text" name="tgl_pengaduan" class="form-control" readonly value="<?= $data['Tgl_pengaduan']; ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 14px;">Isi Laporan</label>
                <textarea name="isi_laporan" class="form-control" required readonly><?= $data['isi_laporan']; ?></textarea>
            </div>
            <div class="form-group">
                <label style="font-size: 14px;">Foto</label>
                <img class="img-thumbnail" src="foto/<?= $data['foto'] ?>" width="300">
            </div>

            <?php if ($data['status'] != '0') {
            ?>
                <div class="form-group">
                    <label style="font-size: 14px;">Tanggapan</label>
                    <textarea name="tanggapan" class="form-control" readonly><?= $data['tanggapan']; ?></textarea>
                </div>
            <?php } else { ?>
                <div class="alert alert-info">
                    <strong>Pengaduan ini masih belum diproses/belum diverifikasi</strong>
                </div>
            <?php } ?>

            <?php if ($data['status'] != 'proses') {
            ?>
                <div class="form-group">
                    <label style="font-size: 14px;">Tanggapan</label>
                    <textarea name="tanggapan" class="form-control" readonly><?= $data['tanggapan']; ?></textarea>
                </div>
            <?php } else { ?>
                <div class="alert alert-info">
                    <strong>Pengaduan ini masih dalam tahap penyelesaian</strong>
                </div>
            <?php } ?>
        </form>
    </div>
</div>