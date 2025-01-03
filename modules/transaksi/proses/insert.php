<?php
session_start();
require_once('../../../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $tanggal = date('Y-m-d');
   $produk_ids = $_POST['produk_id'];
   $quantities = $_POST['quantity'];
   $total = 0;

   $conn->query("INSERT INTO transaksi (tanggal_transaksi, total, pengguna_id) VALUES ('$tanggal', '$total', 1)");
   $transaksi_id = $conn->insert_id;

   for ($i = 0; $i < count($produk_ids); $i++) {
      $produk_id = $produk_ids[$i];
      $quantity = $quantities[$i];

      // Fetch harga from the database
      $result = $conn->query("SELECT harga FROM produk WHERE id = $produk_id");
      $row = $result->fetch_assoc();
      $harga = $row['harga'];
      $sub_total = $harga * $quantity;

      $conn->query("INSERT INTO transaksi_detail (transaksi_id, produk_id, quantity, harga, sub_total) VALUES ($transaksi_id, $produk_id, $quantity, $harga, $sub_total)");

      // Pengurangan stok saat proses transaksi
      $conn->query("UPDATE produk SET stok = stok - $quantity WHERE id = $produk_id");

      // Add to total amount
      $total += $sub_total;
   }

   // Update transaction total amount
   $update_total = $conn->query("UPDATE transaksi SET total = $total WHERE id = $transaksi_id");

   if ($update_total) {
      // echo "Transaction completed successfully! Total amount: " . $total;
      $_SESSION['sukses'] = "Berhasil melakukan transaksi baru senilai <b>Rp " . number_format($total, 2, ',', '.') . "</b>.";
      header("location: ../../../main.php?module=riwayat-transaksi");
      return false;
   } else {
      $_SESSION['gagal'] = "Terjadi kesalahan saat melakukan transaksi.";
      header("location: ../../../main.php?module=transaksi");
      return false;
   }
}
