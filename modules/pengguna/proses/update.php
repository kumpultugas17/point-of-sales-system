<?php
session_start();
require_once('../../../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id = $_POST['id'];
   $nama_pengguna = $_POST['nama_pengguna'];
   $alamat = $_POST['alamat'];
   $telepon = $_POST['telepon'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = "secret";
   $role = $_POST['role'];

   $sql = $conn->query("UPDATE pengguna SET nama_pengguna = '$nama_pengguna', alamat = '$alamat', telepon = '$telepon', email = '$email', username = '$username', role = '$role' WHERE id = '$id'");

   if ($sql) {
      $_SESSION['sukses'] = "Berhasil menambahkan pengguna baru.";
      header("location: ../../../main.php?module=list-pengguna");
      return false;
   } else {
      $_SESSION['gagal'] = "Gagal menambahkan pengguna baru.";
      header("location: ../../../main.php?module=list-pengguna");
      return false;
   }
}
