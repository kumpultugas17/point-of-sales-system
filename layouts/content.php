<?php
$module = isset($_GET['module']) ? $_GET['module'] : 'dashboard';

switch ($module) {
      // Dashboard
   case 'dashboard':
      include 'modules/dashboard/index.php';
      break;
      // Produk
   case 'kelola-produk':
      include 'modules/produk/index.php';
      break;
   case 'edit-produk':
      include 'modules/produk/edit.php';
      break;
      // Stok Produk
   case 'kelola-stok':
      include 'modules/stok-produk/index.php';
      break;
   case 'detail-stok-produk':
      include 'modules/stok-produk/detail.php';
      break;
      // Kategori
   case 'kelola-kategori':
      include 'modules/kategori/index.php';
      break;
      // Transaksi
   case 'transaksi':
      include 'modules/transaksi/index.php';
      break;
   case 'riwayat-transaksi':
      include 'modules/riwayat_transaksi/index.php';
      break;
   case 'detail-transaksi':
      include 'modules/riwayat_transaksi/detail.php';
      break;
      // Laporan
   case 'laporan':
      include 'modules/laporan/index.php';
      break;
   case 'export-excel':
      include 'modules/laporan/export-excel.php';
      break;
      // Pengguna
   case 'tambah-pengguna':
      include 'modules/pengguna/tambah.php';
      break;
   case 'list-pengguna':
      include 'modules/pengguna/index.php';
      break;
   default:
      include 'modules/dashboard/index.php';
      break;
}
