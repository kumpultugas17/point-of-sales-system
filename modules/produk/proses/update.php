<?php
session_start();
require_once('../../../config/database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $kode_produk = $_POST['kode_produk'];
   $nama_produk = $_POST['nama_produk'];
   $kategori = $_POST['kategori'];
   $harga = $_POST['harga'];
   $stok = $_POST['stok'];
   $gambar_lama = $_POST['gambar_lama'];

   $gambar = $_FILES['gambar']['name'];
   $tmp_name = $_FILES['gambar']['tmp_name'];
   $size = $_FILES['gambar']['size'];

   if ($gambar == '') {
      $sql = $conn->query("UPDATE produk SET nama_produk='$nama_produk', kategori_id='$kategori', harga='$harga', stok='$stok' WHERE kode_produk='$kode_produk'");

      if ($sql) {
         $_SESSION['sukses'] = "Berhasil memperbarui data produk dengan kode <b>$kode_produk</b>.";
         header("location: ../../../main.php?module=kelola-produk");
         return false;
      } else {
         $_SESSION['gagal'] = "Gagal memperbarui data produk.";
         header("location: ../../../main.php?module=kelola-produk");
         return false;
      }
   } else {
      if ($size > 1000000) {
         $_SESSION['peringatan'] = "Ukuran gambar yang diunggah terlalu besar.";
         header("location: ../../../main.php?module=kelola-produk");
         return false;
      }

      $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
      $ekstensiGambar = explode('.', $gambar);
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
         $_SESSION['peringatan'] = "Format gambar yang diunggah tidak sesuai.";
         header("location: ../../../main.php?module=kelola-produk");
         return false;
      }

      $namaGambarBaru = uniqid();
      $namaGambarBaru .= '.';
      $namaGambarBaru .= $ekstensiGambar;

      $upload = move_uploaded_file($tmp_name, '../../../assets/img/produk/' . $namaGambarBaru);

      if (!$upload) {
         $_SESSION['gagal'] = "Gambar gagal diunggah.";
         header("location: ../../../main.php?module=kelola-produk");
         return false;
      }

      $sql = $conn->query("UPDATE produk SET nama_produk='$nama_produk', kategori_id='$kategori', harga='$harga', stok='$stok', gambar='$namaGambarBaru' WHERE kode_produk='$kode_produk'");

      if ($sql) {
         unlink('../../../assets/img/produk/' . $gambar_lama);
         $_SESSION['sukses'] = "Berhasil memperbarui data produk dengan kode <b>$kode_produk</b>.";
         header("location: ../../../main.php?module=kelola-produk");
         return false;
      } else {
         $_SESSION['gagal'] = "Gagal memperbarui data produk.";
         header("location: ../../../main.php?module=kelola-produk");
         return false;
      }
   }
}
