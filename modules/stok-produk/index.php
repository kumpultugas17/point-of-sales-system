<?php
$produk = $conn->query("SELECT * FROM produk INNER JOIN kategori ON produk.kategori_id = kategori.id ORDER BY produk.stok ASC");
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <nav class="mb-3" aria-label="breadcrumb">
      <div class="d-flex justify-content-between align-items-center">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
               <a href="?module=dashboard">Home</a>
            </li>
            <li class="breadcrumb-item">
               <a href="javascript:void(0);">Produk</a>
            </li>
            <li class="breadcrumb-item active">List Produk</li>
         </ol>
      </div>
   </nav>

   <div class="nav-align-top mb-4">
      <div class="card mb-4">
         <div class="card-body p-3">
            <div class="table-responsive text-nowrap">
               <table class="table table-hover display" id="tableData">
                  <thead>
                     <tr class="text-nowrap">
                        <th>#</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga Satuan</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1; ?>
                     <?php if ($produk->num_rows > 0) { ?>
                        <?php foreach ($produk as $prd) : ?>
                           <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td>
                                 <div class="d-flex">
                                    <div class="avatar flex-shrink-0 me-3">
                                       <span class="avatar-initial rounded bg-label-primary">
                                          <img src="assets/img/produk/<?= $prd['gambar'] != "" ? $prd['gambar'] : "default.png" ?>" alt="PRD">
                                       </span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                       <div class="me-2">
                                          <h6 class="mb-0"><?= $prd['nama_produk'] ?></h6>
                                          <small class="text-muted"><?= $prd['kode_produk'] ?></small>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td><?= $prd['nama_kategori'] ?></td>
                              <td>Rp <?= number_format($prd['harga'], 2, ',', '.') ?></td>
                              <td class="text-center">
                                 <?php
                                 if ($prd['stok'] <= 5) {
                                    $labelBadge = "badge bg-danger";
                                 } elseif ($prd['stok'] <= 10) {
                                    $labelBadge = "badge bg-warning";
                                 } else {
                                    $labelBadge = "badge bg-success";
                                 }
                                 ?>
                                 <span class="<?= $labelBadge ?>"><?= $prd['stok'] ?></span>
                              </td>
                              <td>
                                 <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                       <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item d-flex align-items-center" href="?module=detail-stok-produk&kode=<?= $prd['kode_produk'] ?>">
                                          <i class="bx bx-list-plus me-1"></i> Detail
                                       </a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     <?php } else {  ?>
                        <tr>
                           <td colspan="5" class="text-center">Data Tidak Ditemukan</td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->