<?php
session_start();
require_once('../../../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $kode_produk = $_POST['kode_produk'];
   // Cek apakah ada gambar
   $produk = $conn->query("SELECT * FROM produk WHERE kode_produk = '$kode_produk'");
   $prd = $produk->fetch_assoc();
   $gambar = $prd['gambar'];

   if ($gambar != '') {
      unlink('../../../assets/img/produk/' . $gambar);
   }

   $sql = $conn->query("DELETE FROM produk WHERE kode_produk = '$kode_produk'");

   if ($sql) {
      $_SESSION['sukses'] = "Berhasil menghapus data dengan kode produk <b>$kode_produk</b>.";
      header("location: ../../../main.php?module=kelola-produk");
      return false;
   } else {
      $_SESSION['gagal'] = "Gagal menghapus data dengan kode produk <b>$kode_produk</b>.";
      header("location: ../../../main.php?module=kelola-produk");
      return false;
   }
}
