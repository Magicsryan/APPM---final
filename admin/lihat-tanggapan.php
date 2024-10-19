<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">Data Pengaduan</h5>
  </div>
  <div class="card-body style=" font-size: 12px>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr style="font-size: 19px;">
            <th>ID Pengaduan</th>
            <th>Tgl Pengaduan</th>
            <th>NIK</th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          
          <?php
          include 'koneksi.php';
          if (isset($_GET['id'])) {
            $sql = "SELECT * FROM tanggapan ORDER BY id_tanggapan DESC";
            $query = mysqli_query($koneksi, $sql);
            $no = 1;

            $id = $_GET['id'];
            $sql = "SELECT * FROM pengaduan, tanggapan WHERE tanggapan.id_pengaduan='$id' AND tanggapan.id_pengaduan=pengaduan.id_pengaduan";
          } else {
            $sql = "SELECT * FROM pengaduan, tanggapan WHERE tanggapan.id_pengaduan=pengaduan.id_pengaduan";
          }

          $query = mysqli_query($koneksi, $sql);
          $no = 1;
          while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
              <td><?= $data['id_tanggapan']; ?></td>
              <td><?= $data['Tgl_pengaduan']; ?></td>
              <td><?= $data['nik']; ?></td>
              <td><?= $data['isi_laporan']; ?></td>
              <td><img class="img-thumbnail" src="foto/<?= $data['foto'] ?>" width="150"></td>
              <td><?= $data['status']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>