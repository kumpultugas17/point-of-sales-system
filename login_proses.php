<?php
session_start();
require_once 'config/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $email_username = $_POST['email_username'];
   $password = $_POST['password'];

   $sql = $conn->query("SELECT * FROM pengguna WHERE email = '$email_username' OR username = '$email_username'");
   if ($sql->num_rows > 0) {
      $row = $sql->fetch_assoc();
      if (password_verify($password, $row['password'])) {
         session_start();
         $_SESSION['login'] = true;
         $_SESSION['id'] = $row['id'];
         $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
         $_SESSION['username'] = $row['username'];
         $_SESSION['role'] = $row['role'];
         $_SESSION['sukses'] = "Selamat datang, " . $_SESSION['nama_pengguna'] . ".";
         header('Location: index.php');
         return false;
      } else {
         $_SESSION['gagal'] = "Password salah, silahkan coba lagi!";
         header('Location: login.php');
         return false;
      }
   } else {
      $_SESSION['gagal'] = "Email atau username salah, silahkan coba lagi!";
      header('Location: login.php');
      return false;
   }
}
