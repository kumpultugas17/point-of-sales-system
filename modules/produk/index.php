<?php
$produk = $conn->query("SELECT * FROM produk INNER JOIN kategori ON produk.kategori_id = kategori.id ORDER BY produk.id DESC");
$kategori = $conn->query("SELECT * FROM kategori");
// Buat Kode Produk Otomatis
$last_produk = $conn->query("SELECT * FROM produk ORDER BY id DESC LIMIT 1");
if ($last_produk->num_rows > 0) {
   $row = $last_produk->fetch_assoc();
   $last_kode = substr($row['kode_produk'], 3);
   $last_kode = (int) $last_kode;
   $new_kode = "PRD" . str_pad($last_kode + 1, 3, "0", STR_PAD_LEFT);
} else {
   $new_kode = "PRD001";
}
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
            <ul class="nav nav-pills" role="tablist">
               <li class="nav-item">
                  <button type="button" class="nav-link active d-flex align-items-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-list-produk" aria-controls="navs-list-produk" aria-selected="true">
                     <span class="tf-icons bx bx-list-ul me-2"></span> List Produk
                  </button>
               </li>
               <li class="nav-item">
                  <button type="button" class="nav-link d-flex align-items-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tambah-produk" aria-controls="navs-tambah-produk" aria-selected="false">
                     <span class="tf-icons bx bx-plus me-2"></span> Tambah Produk
                  </button>
               </li>
            </ul>
         </div>
      </div>
      <div class="card mb-4">
         <div class="card-body p-3">
            <div class="tab-content p-0">
               <div class="tab-pane fade active show" id="navs-list-produk" role="tabpanel">
                  <div class="table-responsive text-nowrap">
                     <table class="table table-hover" id="tableData" class="display">
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
                                    <td class="text-center"><?= $prd['stok'] ?></td>
                                    <td>
                                       <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                             <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                             <a class="dropdown-item" href="?module=edit-produk&kode=<?= $prd['kode_produk'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                             <!-- Trigger Modal Hapus -->
                                             <button type="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#hapusProduk<?= $prd['kode_produk'] ?>">
                                                <i class="bx bx-trash me-2"></i> Hapus
                                             </button>
                                          </div>

                                          <!-- Modal Hapus -->
                                          <div class="modal fade" id="hapusProduk<?= $prd['kode_produk'] ?>" data-bs-backdrop="static" tabindex="-1">
                                             <div class="modal-dialog">
                                                <form class="modal-content" action="modules/produk/proses/delete.php" method="POST">
                                                   <div class="modal-header">
                                                      <h5 class="modal-title d-flex align-items-center" id="backDropModalTitle">
                                                         <i class="bx bx-trash me-2"></i> Hapus Produk
                                                      </h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                   </div>
                                                   <div class="modal-body text-wrap">
                                                      <input type="hidden" name="kode_produk" value="<?= $prd['kode_produk'] ?>">
                                                      <p>
                                                         Apakah anda yakin ingin menghapus produk ini <b><?= $prd['kode_produk'] . " - " . $prd['nama_produk'] ?></b>?
                                                      </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                         Batal
                                                      </button>
                                                      <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                   </div>
                                                </form>
                                             </div>
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
               <div class="tab-pane fade" id="navs-tambah-produk" role="tabpanel">
                  <form class="px-3 py-2 needs-validation" action="modules/produk/proses/insert.php" method="POST" enctype="multipart/form-data" novalidate>
                     <div class="mb-3">
                        <label class="form-label" for="kode_produk">Kode Produk</label>
                        <input type="text" name="kode_produk" class="form-control" id="kode_produk" value="<?= $new_kode ?>" required readonly>
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" id="nama_produk" placeholder="Masukkan Nama Produk" required>
                        <div class="invalid-feedback">
                           Nama Produk Harus Diisi
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="kategori">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                           <option value="" selected>Pilih Kategori</option>
                           <?php foreach ($kategori as $k) : ?>
                              <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
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
                           <input type="number" id="harga" name="harga" class="form-control" placeholder="0" required>
                           <span class="input-group-text">.00</span>
                           <div class="invalid-feedback">
                              Harga Produk Harus Diisi
                           </div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="stok">Stok</label>
                        <input type="text" id="stok" name="stok" class="form-control" placeholder="0" required>
                        <div class="invalid-feedback">
                           Stok Harus Diisi
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="gambar">Gambar Produk</label>
                        <input class="form-control" type="file" id="gambar" name="gambar">
                        <span class="small">Ukuran gambar maksimal 1MB dengan format .jpg, .jpeg, .png</span>
                     </div>
                     <button type="submit" class="btn btn-primary">Buat</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->