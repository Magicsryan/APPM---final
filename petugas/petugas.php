<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] !== "petugas") {
  echo "<script>alert('Maaf Anda Bukan Pada Sesi Petugas'); window.location.assign('../index2.php');</script>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Aplikasi Pelaporan Pengaduan Masyarakat</title>
  <!-- Custom fonts and styles -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
    .bg-custom {
      background-color: #222831 !important;
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="d-flex">
    <ul class="navbar-nav bg-custom sidebar sidebar-dark accordion p-3">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-th-large"></i>
        </div>
        <div class="sidebar-brand-text mx-3">APPM</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <div class="sidebar-heading">Interface</div>
      <li class="nav-item">
        <a class="nav-link" href="petugas.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?url=verifikasi-pengaduan">
          <i class="fas fa-fw fa-edit"></i>
          <span>Tanggapi Laporan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?url=lihat-pengaduan">
          <i class="fas fa-fw fa-search"></i>
          <span>Lihat Laporan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <h1>Aplikasi Pelaporan Pengaduan Masyarakat</h1>
        </nav>

        <div class="container-fluid">
          <h1 class="h4 mb-4 text-gray-800">
            <?php include 'halaman.php'; ?>
          </h1>
        </div>
      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Aplikasi Pelaporan Pengaduan Masyarakat &copy; 2023</span>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript and custom scripts-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/sb-admin-2.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>