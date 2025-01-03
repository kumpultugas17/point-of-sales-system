<?php
session_start();
require_once('../../../config/database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $tanggal = date('Y-m-d');
   $kode_produk = $_POST['kode_produk'];
   $produk_id = $_POST['produk_id'];
   $stok_masuk = $_POST['stok_masuk'];

   $sql = $conn->query("INSERT INTO stok_detail (produk_id, stok_masuk, tanggal_masuk) VALUES ('$produk_id', '$stok_masuk', '$tanggal')");

   if ($sql) {
      $sql = $conn->query("UPDATE produk SET stok = stok + $stok_masuk WHERE id = '$produk_id'");
      $_SESSION['sukses'] = "Berhasil menambahkan stok produk sebanyak <b>$stok_masuk</b>.";
      header("location: ../../../main.php?module=detail-stok-produk&kode=$kode_produk");
      return false;
   } else {
      $_SESSION['gagal'] = "Gagal menambahkan stok produk.";
      header("location: ../../../main.php?module=detail-stok-produk&kode=$kode_produk");
      return false;
   }
}
