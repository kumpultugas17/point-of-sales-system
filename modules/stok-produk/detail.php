<?php
$kode_produk = $_GET['kode'];
// Get Data Produk
$produk = $conn->query("SELECT *, produk.id as id_produk FROM produk INNER JOIN kategori ON produk.kategori_id = kategori.id WHERE produk.kode_produk = '$kode_produk'");
$prd = $produk->fetch_assoc();

$stok = $conn->query("SELECT * FROM stok_detail WHERE produk_id = '$prd[id_produk]'");
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
         <div class="card-body">
            <a href="?module=kelola-stok" type="button" class="btn btn-outline-secondary d-flex align-items-center" style="width: fit-content;">
               <span class="tf-icons bx bx-list-ul me-2"></span> List Stok Produk
            </a>
         </div>
      </div>
      <div class="card mb-4">
         <div class="card-body">
            <div class="row g-3">
               <div class="col-sm-12 col-md-2">
                  <div class="d-flex justify-content-center align-items-center border border-1 py-4">
                     <img src="assets/img/produk/<?= $prd['gambar'] != "" ? $prd['gambar'] : "default.png" ?>" alt="PRD" class="d-block w-px-100 h-px-100 rounded mt-2">
                  </div>
                  <div class="d-grid gap-2 mx-auto">
                     <!-- Button trigger modal tambah stok -->
                     <button class="btn btn-warning btn-sm mt-3 d-block" type="button" data-bs-toggle="modal" data-bs-target="#modalTambahStok">
                        Tambah Stok
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="modalTambahStok" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-sm">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="backDropModalTitle">
                                    <i class="bx bx-list-plus me-1"></i> Tambah Stok
                                 </h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="modules/stok-produk/proses/add.php" method="POST">
                                 <div class="modal-body">
                                    <input type="hidden" name="produk_id" value="<?= $prd['id_produk'] ?>">
                                    <input type="hidden" name="kode_produk" value="<?= $_GET['kode'] ?>">
                                    <label for="stok_masuk" class="form-label">Jumlah Stok Masuk</label>
                                    <input type="number" id="stok_masuk" name="stok_masuk" class="form-control" placeholder="0">
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal"> Batal</button>
                                    <button type="submit" class="btn btn-warning btn-sm ms-2">Simpan</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-12 col-md-4">
                  <div class="card-body border border-1 p-4">
                     <div class="mb-3">
                        <label class="form-label">Kode Produk</label>
                        <input type="text" class="form-control form-control-sm" value="<?= $prd['kode_produk'] ?>" readonly>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control form-control-sm" value="<?= $prd['nama_produk'] ?>" readonly>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" class="form-control form-control-sm" value="<?= $prd['nama_kategori'] ?>" readonly>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Harga Produk</label>
                        <div class="input-group input-group-sm">
                           <span class="input-group-text">Rp</span>
                           <input type="text" class="form-control form-control-sm" value="<?= number_format($prd['harga'], 2, ',', '.') ?>" readonly>
                        </div>
                     </div>
                     <div>
                        <label class="form-label">Stok</label>
                        <input type="text" class="form-control form-control-sm" value="<?= $prd['stok'] ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6">
                  <table class="table table-sm table-bordered text-center" id="tableStok" style="margin-top: -16px;">
                     <thead>
                        <tr>
                           <th class="text-center">#</th>
                           <th class="text-center">Tanggal Penambahan Stok</th>
                           <th class="text-center">Stok Masuk</th>
                        </tr>
                     </thead>
                     <tbody class="text-center">
                        <?php $no = 1; ?>
                        <?php foreach ($stok as $stk) : ?>
                           <tr>
                              <th scope="row" class="text-center"><?= $no++ ?></th>
                              <td class="text-center"><?= date('d-m-Y', strtotime($stk['tanggal_masuk'])) ?></td>
                              <td class="text-center"><?= $stk['stok_masuk'] ?></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->