<?php
$transaksi = $conn->query("SELECT * FROM transaksi");
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <nav class="mb-3" aria-label="breadcrumb">
      <div class="d-flex justify-content-between align-items-center">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
               <a href="?module=dashboard">Home</a>
            </li>
            <li class="breadcrumb-item">
               <a href="javascript:void(0);">Kategori</a>
            </li>
            <li class="breadcrumb-item active">List Kategori</li>
         </ol>
      </div>
   </nav>

   <div class="nav-align-top mb-4">
      <div class="card mb-4">
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <h6>Filter Tanggal</h6>
                  <form action="?module=laporan" method="get" class="d-flex align-items-center">
                     <div class="input-group input-group-sm">
                        <input type="date" name="start" class="form-control">
                        <span class="input-group-text">to</span>
                        <input type="date" name="end" class="form-control">
                     </div>
                     <button type="submit" class="btn btn-primary btn-sm align-items-center ms-2">
                        <span class="tf-icons bx bx-search me-2"></span> Cari
                     </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="card mb-4">
         <div class="card-body p-3">
            <table class="table table-striped table-bordered">
               <thead>
                  <tr class="text-nowrap">
                     <th class="text-center">#</th>
                     <th class="text-center">Tanggal Transaksi</th>
                     <th class="text-center">Total</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($transaksi as $trx) : ?>
                     <?php $grand_total = 0; ?>
                     <?php $grand_total += $trx['total']; ?>
                     <tr>
                        <th scope="row" class="text-center"><?= $no++ ?></th>
                        <td class="text-center"><?= $trx['tanggal_transaksi'] ?></td>
                        <td class="text-center">Rp <?= number_format($trx['total'], 2, ',', '.') ?></td>
                     </tr>
                  <?php endforeach; ?>
                  <tr>
                     <th scope="row" class="text-center" colspan="2">Grand Total</th>
                     <td class="text-center">Rp <?= number_format($grand_total, 2, ',', '.') ?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->