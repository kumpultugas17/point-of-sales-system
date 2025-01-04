<?php
session_start();
require_once('../../../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $nama_pengguna = $_POST['nama_pengguna'];
   $alamat = $_POST['alamat'];
   $telepon = $_POST['telepon'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = "secret";
   $role = $_POST['role'];

   // Enkripsi password
   $password = password_hash($password, PASSWORD_DEFAULT);

   // Cek apakah username sudah ada
   $sql = $conn->query("SELECT * FROM pengguna WHERE username = '$username' OR email = '$email'");
   if ($sql->num_rows > 0) {
      $_SESSION['gagal'] = "Username atau email yang dimasukkan sudah ada.";
      header("location: ../../../main.php?module=list-pengguna");
      return false;
   }

   $sql = $conn->query("INSERT INTO pengguna (nama_pengguna, alamat, telepon, email, username, password, role) VALUES('$nama_pengguna', '$alamat', '$telepon', '$email', '$username', '$password', '$role')");
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
