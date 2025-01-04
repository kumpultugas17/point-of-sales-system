<?php
$transaksi = $conn->query("SELECT *, transaksi.id as id_transaksi FROM transaksi INNER JOIN pengguna ON transaksi.pengguna_id = pengguna.id ORDER BY transaksi.id DESC");
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <nav class="mb-3" aria-label="breadcrumb">
      <div class="d-flex justify-content-between align-items-center">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
               <a href="?module=dashboard">Home</a>
            </li>
            <li class="breadcrumb-item">
               <a href="javascript:void(0);">Transaksi</a>
            </li>
            <li class="breadcrumb-item active">Riwayat Transaksi</li>
         </ol>
      </div>
   </nav>

   <div class="card mb-4">
      <div class="card-body p-3">
         <div class="tab-content p-0">
            <div class="tab-pane fade active show" id="navs-list-produk" role="tabpanel">
               <table class="table table-hover" id="tableData" class="display">
                  <thead>
                     <tr class="text-nowrap">
                        <th class="text-center">#</th>
                        <th class="text-center">Tanggal Transaksi</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Kasir</th>
                        <th class="text-center">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1; ?>
                     <?php foreach ($transaksi as $trx) : ?>
                        <tr>
                           <th scope="row" class="text-center"><?= $no++ ?></th>
                           <td class="text-center"><?= $trx['tanggal_transaksi'] ?></td>
                           <td class="text-center">Rp <?= number_format($trx['total'], 2, ',', '.') ?></td>
                           <td class="text-center"><?= $trx['nama_pengguna'] ?></td>
                           <td class="text-center">
                              <a href="?module=detail-transaksi&id=<?= $trx['id_transaksi'] ?>" class="btn btn-outline-dark">
                                 <span class="tf-icons bx bx-detail fs-5 me-2"></span>Detail Produk
                              </a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->