<?php
$kode_produk = $_GET['kode'];
$produk = $conn->query("SELECT * FROM produk INNER JOIN kategori ON produk.kategori_id = kategori.id WHERE produk.kode_produk = '$kode_produk'");
$prd = $produk->fetch_assoc();
$kategori = $conn->query("SELECT * FROM kategori");
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
            <a href="?module=kelola-produk" type="button" class="btn btn-outline-secondary d-flex align-items-center" style="width: fit-content;">
               <span class="tf-icons bx bx-list-ul me-2"></span> List Produk
            </a>
         </div>
      </div>
      <div class="card mb-4">
         <div class="card-body p-3">
            <form class="px-3 py-2 needs-validation" action="modules/produk/proses/update.php" method="POST" enctype="multipart/form-data" novalidate>
               <div class="mb-3">
                  <label class="form-label" for="kode_produk">Kode Produk</label>
                  <input type="text" name="kode_produk" class="form-control" id="kode_produk" value="<?= $prd['kode_produk'] ?>" required readonly>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="nama_produk">Nama Produk</label>
                  <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="<?= $prd['nama_produk'] ?>" required>
                  <div class="invalid-feedback">
                     Nama Produk Harus Diisi
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="kategori">Kategori</label>
                  <select class="form-select" id="kategori" name="kategori" required>
                     <option value="" selected>Pilih Kategori</option>
                     <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k['id'] ?>" <?= $k['id'] == $prd['kategori_id'] ? "selected" : "" ?>><?= $k['nama_kategori'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                     Kategori Harus Dipilih
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="harga">Harga Produk</label>
                  <div class="input-group">
                     <span class="input-group-text">Rp</span>
                     <input type="number" id="harga" name="harga" class="form-control" value="<?= $prd['harga'] ?>" required>
                     <span class="input-group-text">,00</span>
                     <div class="invalid-feedback">
                        Harga Produk Harus Diisi
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="stok">Stok</label>
                  <input type="text" id="stok" name="stok" class="form-control" value="<?= $prd['stok'] ?>" required>
                  <div class="invalid-feedback">
                     Stok Harus Diisi
                  </div>
               </div>
               <div class="mb-3">
                  <div class="row g-3">
                     <div class="col-sm-12 col-md-2">
                        <label class="form-label">Gambar Produk</label>
                        <div class="d-flex align-items-start align-items-sm-center border-1">
                           <img src="assets/img/produk/<?= $prd['gambar'] != "" ? $prd['gambar'] : "default.png" ?>" alt="PRD" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-10">
                        <label class="form-label" for="gambar">Unggah Gambar Produk Baru</label>
                        <input class="form-control" type="file" id="gambar" name="gambar">
                        <input type="hidden" name="gambar_lama" value="<?= $prd['gambar'] ?>">
                        <span class="small">Ukuran gambar maksimal 1MB dengan format .jpg, .jpeg, .png</span>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->