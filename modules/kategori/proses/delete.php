<?php
session_start();
require_once('../../../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id_kategori = $_POST['id_kategori'];

   $sql = $conn->query("DELETE FROM kategori WHERE id = '$id_kategori'");

   if ($sql) {
      $_SESSION['sukses'] = "Berhasil menghapus kategori produk.";
      header("location: ../../../main.php?module=kelola-kategori");
      return false;
   } else {
      $_SESSION['gagal'] = "Gagal menghapus kategori produk.";
      header("location: ../../../main.php?module=kelola-kategori");
      return false;
   }
}
