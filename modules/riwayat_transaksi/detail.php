<?php
$transaksi = $conn->query("SELECT * FROM transaksi_detail INNER JOIN transaksi ON transaksi_detail.transaksi_id = transaksi.id INNER JOIN produk ON transaksi_detail.produk_id = produk.id WHERE transaksi.id = '$_GET[id]'");
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <nav class="mb-3" aria-label="breadcrumb">
      <div class="d-flex justify-content-between align-items-center">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
               <a href="?module=dashboard">Home</a>
            </li>
            <li class="breadcrumb-item">
               <a href="javascript:void(0);">Riwayat Transaksi</a>
            </li>
            <li class="breadcrumb-item active">Detail Transaksi</li>
         </ol>
      </div>
   </nav>

   <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="mb-0">Detail Transaksi</h5>
         <a href="?module=riwayat-transaksi" class="btn btn-secondary">Kembali</a>
      </div>
      <div class="card-body">
         <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr class="text-nowrap">
                     <th class="text-center">#</th>
                     <th class="text-center">Tanggal Transaksi</th>
                     <th class="text-center">Kode Produk</th>
                     <th class="text-center">Nama Produk</th>
                     <th class="text-center">Harga</th>
                     <th class="text-center">Qty</th>
                     <th class="text-center">Diskon</th>
                     <th class="text-center">Subtotal</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($transaksi as $trx) : ?>
                     <?php $grand_total = 0; ?>
                     <?php $grand_total += $trx['sub_total']; ?>
                     <tr>
                        <th scope="row" class="text-center"><?= $no++ ?></th>
                        <td class="text-center"><?= $trx['tanggal_transaksi'] ?></td>
                        <td class="text-center"><?= $trx['kode_produk'] ?></td>
                        <td class="text-center"><?= $trx['nama_produk'] ?></td>
                        <td class="text-center">Rp <?= number_format($trx['harga'], 2, ',', '.') ?></td>
                        <td class="text-center"><?= $trx['quantity'] ?></td>
                        <td class="text-center">Rp <?= number_format($trx['diskon'], 2, ',', '.') ?></td>
                        <td class="text-center">Rp <?= number_format($trx['sub_total'], 2, ',', '.') ?></td>
                     </tr>
                  <?php endforeach; ?>
                  <tr>
                     <th scope="row" class="text-center" colspan="7">Grand Total</th>
                     <td class="text-center">Rp <?= number_format($grand_total, 2, ',', '.') ?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->