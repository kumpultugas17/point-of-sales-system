<?php
session_start();
require_once('../../../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $nama_kategori = $_POST['nama_kategori'];
   $deskripsi = $_POST['deskripsi'];

   $sql = $conn->query("INSERT INTO kategori (nama_kategori, deskripsi) VALUES('$nama_kategori', '$deskripsi')");
   if ($sql) {
      $_SESSION['sukses'] = "Berhasil menambahkan kategori baru.";
      header("location: ../../../main.php?module=kelola-kategori");
      return false;
   } else {
      $_SESSION['gagal'] = "Gagal menambahkan kategori baru.";
      header("location: ../../../main.php?module=kelola-kategori");
      return false;
   }
}
