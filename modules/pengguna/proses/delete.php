<?php
session_start();
require_once('../../../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id_pengguna = $_POST['id_pengguna'];

   $sql = $conn->query("DELETE FROM pengguna WHERE id = '$id_pengguna'");

   if ($sql) {
      $_SESSION['sukses'] = "Berhasil menghapus data pengguna.";
      header("location: ../../../main.php?module=list-pengguna");
      return false;
   } else {
      $_SESSION['gagal'] = "Gagal menghapus data pengguna.";
      header("location: ../../../main.php?module=list-pengguna");
      return false;
   }
}
