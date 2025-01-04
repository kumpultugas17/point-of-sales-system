<?php
session_start();
require_once 'config/database.php';

// Tangkap parameter dari URL
$module = isset($_GET['module']) ? $_GET['module'] : 'dashboard';

// Tentukan judul berdasarkan parameter
$titles = [
   'dashboard' => 'Dashboard',
   'transaksi' => 'Transaksi Baru',
   'riwayat-transaksi' => 'Riwayat Transaksi',
   'detail-transaksi' => 'Detail Transaksi',
   'kelola-produk' => 'Kelola Produk',
   'edit-produk' => 'Edit Produk',
   'kelola-stok' => 'Kelola Stok Produk',
   'detail-stok-produk' => 'Detail Stok',
   'kelola-kategori' => 'Kelola Kategori',
   'laporan' => 'Laporan Keuangan',
   'export-excel' => 'Export Data ke Excel',
   'list-pengguna' => 'List Pengguna',
   'tambah-pengguna' => 'Tambah Pengguna',
];

// Default title jika module tidak terdaftar
$title = isset($titles[$module]) ? $titles[$module] : 'Halaman Tidak Dikenal';
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

   <title><?= $title ?></title>

   <meta name="description" content="" />

   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

   <!-- Icons. Uncomment required icon fonts -->
   <link rel="stylesheet" href="assets/vendor/libs/boxicons-2.1.4/css/boxicons.min.css">

   <!-- Core CSS -->
   <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
   <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
   <link rel="stylesheet" href="assets/css/demo.css" />

   <!-- Vendors CSS -->
   <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
   <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

   <!-- DataTables -->
   <link href="assets/vendor/libs/DataTables/datatables.min.css" rel="stylesheet">

   <!-- Page CSS -->

   <!-- Helpers -->
   <script src="assets/vendor/js/helpers.js"></script>

   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="assets/js/config.js"></script>
</head>

<body>
   <!-- Layout wrapper -->
   <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
         <!-- Menu -->
         <?php include 'layouts/sidebar.php'; ?>
         <!-- / Menu -->

         <!-- Layout container -->
         <div class="layout-page">
            <!-- Navbar -->
            <?php include 'layouts/navbar.php'; ?>
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
               <!-- Content -->
               <?php include 'layouts/content.php'; ?>
               <!-- / Content -->

               <!-- Footer -->
               <?php include 'layouts/footer.php'; ?>
               <!-- / Footer -->

               <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
         </div>
         <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Notifications Toast -->
      <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 2000;">
         <div id="toastSuccess" class="bs-toast toast fade bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
               <i class="bx bx-bell me-2"></i>
               <div class="me-auto fw-medium">Notifikasi</div>
               <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
               <?= $_SESSION['sukses'] ?>
            </div>
         </div>
      </div>

      <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 2000;">
         <div id="toastError" class="bs-toast toast fade bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
               <i class="bx bx-bell me-2"></i>
               <div class="me-auto fw-medium">Notifikasi</div>
               <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
               <?= $_SESSION['gagal'] ?>
            </div>
         </div>
      </div>

      <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 2000;">
         <div id="toastWarning" class="bs-toast toast fade bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
               <i class="bx bx-bell me-2"></i>
               <div class="me-auto fw-medium">Notifikasi</div>
               <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
               <?= $_SESSION['peringatan'] ?>
            </div>
         </div>
      </div>

   </div>
   <!-- / Layout wrapper -->

   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="assets/vendor/libs/jquery/jquery.js"></script>
   <script src="assets/vendor/libs/popper/popper.js"></script>
   <script src="assets/vendor/js/bootstrap.js"></script>
   <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

   <script src="assets/vendor/js/menu.js"></script>
   <!-- endbuild -->

   <!-- Vendors JS -->
   <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

   <!-- Main JS -->
   <script src="assets/js/main.js"></script>

   <!-- Page JS -->
   <script src="assets/js/dashboards-analytics.js"></script>

   <!-- Place this tag in your head or just before your close body tag. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>

   <!-- DataTables -->
   <script src="assets/vendor/libs/DataTables/datatables.min.js"></script>
   <script>
      $(document).ready(function() {
         // Validations Forms
         const forms = document.querySelectorAll('.needs-validation')

         // Loop over them and prevent submission
         Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
               if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
               }

               form.classList.add('was-validated')
            }, false)
         })

         // DataTables
         $('#tableData').DataTable({
            pageLength: 10, // Menampilkan 10 data per halaman
            responsive: true // Responsif untuk tampilan mobile
         });

         // DataTable Stok
         $('#tableStok').DataTable({
            // Sembunyikan pageLength
            lengthChange: false,
            // sembunyikan pencarian
            searching: false,
            pageLength: 6, // Menampilkan 5 data per halaman
            responsive: true // Responsif untuk tampilan mobile
         });
      });

      // Fungsi untuk menampilkan toast
      function showtoastSuccess() {
         const toastElement = document.getElementById('toastSuccess');
         const toast = new bootstrap.Toast(toastElement, {
            delay: 3000
         }); // 3 detik
         toast.show(); // Tampilkan toast
      }

      function showtoastError() {
         const toastElement = document.getElementById('toastError');
         const toast = new bootstrap.Toast(toastElement, {
            delay: 3000
         }); // 3 detik
         toast.show(); // Tampilkan toast
      }

      function showtoastWarning() {
         const toastElement = document.getElementById('toastWarning');
         const toast = new bootstrap.Toast(toastElement, {
            delay: 3000
         }); // 3 detik
         toast.show(); // Tampilkan toast
      }
   </script>

   <!-- Jika berhasil, kirimkan flag ke JavaScript -->
   <?php
   if (isset($_SESSION['sukses'])) {
      echo "<script>window.onload = function() { showtoastSuccess(); }</script>";
      unset($_SESSION['sukses']); // Hapus sesi
      exit();
   }

   if (isset($_SESSION['gagal'])) {
      echo "<script>window.onload = function() { showtoastError(); }</script>";
      unset($_SESSION['gagal']); // Hapus sesi
      exit();
   }

   if (isset($_SESSION['peringatan'])) {
      echo "<script>window.onload = function() { showtoastWarning(); }</script>";
      unset($_SESSION['peringatan']); // Hapus sesi
      exit();
   }
   ?>

</body>

</html>