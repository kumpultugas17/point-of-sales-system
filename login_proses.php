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
         header('Location: index.php');
         exit;
      } else {
         echo "<script>alert('Password salah!')</script>";
      }
   } else {
      echo "<script>alert('Email atau username salah!')</script>";
   }
}
