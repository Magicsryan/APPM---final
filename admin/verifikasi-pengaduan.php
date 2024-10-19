<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Pengaduan</h6>
    </div>
    <div class="card-body" style="font-size: 14px">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Pengaduan</th>
                        <th>Tgl Pengaduan</th>
                        <th>NIK</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Pengaduan</th>
                        <th>Tgl Pengaduan</th>
                        <th>NIK</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    include '../koneksi.php';

                    $sql = "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC";
                    $query = mysqli_query($koneksi, $sql);
                    $no = 1;

                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?= $data['id_pengaduan']; ?></td>
                            <td><?= $data['Tgl_pengaduan']; ?></td>
                            <td><?= $data['nik']; ?></td>
                            <td><?= $data['isi_laporan']; ?></td>
                            <td><img class="img-thumbnail" src="../foto/<?= $data['foto'] ?>" width="150"></td>
                            <td><?= $data['status']; ?></td>
                            <td>
                                <!-- View Details Button -->
                                <a href="?url=detail-pengaduan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-info btn-icon-split" style="background-color: #252A34; border-color: #252A34;">
                                    <span class="icon text-white-50"><i class="fa fa-info"></i></span>
                                    <span class="text">Lihat Detail</span>
                                </a>
                                <!-- Reject Button (Only if status is 'proses') -->
                                <?php if ($data['status'] == 'proses') { ?>
                                    <a href="proses-tolak.php?action=tolak&id=<?= $data['id_pengaduan'] ?>" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50"><i class="fa fa-times"></i></span>
                                        <span class="text">Tolak</span>
                                    </a>
                                <?php } ?>
                                <!-- Delete Button -->
                                <a href="proses.php?id=<?= $data['id_pengaduan'] ?>" class="btn btn-warning btn-icon-split" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                                    <span class="icon text-white-50"><i class="fa fa-trash"></i></span>
                                    <span class="text">Hapus</span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>