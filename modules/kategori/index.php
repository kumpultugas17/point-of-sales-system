<?php
$kategori = $conn->query("SELECT *, kategori.id AS id_kategori, COUNT(produk.kategori_id) AS total_produk FROM kategori LEFT JOIN produk ON kategori.id = produk.kategori_id  GROUP BY kategori.id ORDER BY kategori.id DESC");
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
            <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="offcanvas" data-bs-target="#offcanvasKategori" aria-controls="offcanvasKategori">
               <span class="tf-icons bx bx-plus me-2"></span> Tambah Kategori
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasKategori" aria-labelledby="offcanvasKategoriLabel" aria-modal="true" role="dialog">
               <div class="offcanvas-header py-6">
                  <h5 id="offcanvasCategoryListLabel" class="offcanvas-title">Tambah Kategori</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
               </div>
               <div class="offcanvas-body border-top">
                  <form class="needs-validation mt-3" action="modules/kategori/proses/insert.php" method="POST" novalidate>
                     <!-- Title -->
                     <div class="mb-3">
                        <label class="form-label" for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama kategori" required>
                        <div class="invalid-feedback">
                           Nama Kategori Harus Diisi
                        </div>
                     </div>
                     <!-- Description -->
                     <div class="mb-6">
                        <label class="form-label" for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="7" placeholder="Masukkan deskripsi" required></textarea>
                        <div class="invalid-feedback">
                           Deskripsi Harus Diisi
                        </div>
                     </div>
                     <!-- Submit and reset -->
                     <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-primary me-1">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-outline-danger" data-bs-dismiss="offcanvas">Batal</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="card mb-4">
         <div class="card-body p-3">
            <div class="table-responsive text-nowrap">
               <table class="table table-hover" id="tableData" class="display">
                  <thead>
                     <tr class="text-nowrap">
                        <th>#</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Total Produk</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1; ?>
                     <?php foreach ($kategori as $ktg) : ?>
                        <tr>
                           <th scope="row"><?= $no++ ?></th>
                           <td><?= $ktg['nama_kategori'] ?></td>
                           <td class="text-wrap"><?= $ktg['deskripsi'] ?></td>
                           <td class="text-center"><?= $ktg['total_produk'] ?></td>
                           <td>
                              <div class="dropdown">
                                 <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                 </button>
                                 <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditKategori<?= $ktg['id_kategori'] ?>" aria-controls="offcanvasKategori">
                                       <i class="bx bx-edit-alt me-1"></i> Edit
                                    </button>
                                    <!-- Trigger Modal Hapus -->
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#hapusKategori<?= $ktg['id_kategori'] ?>">
                                       <i class="bx bx-trash me-2"></i> Hapus
                                    </button>
                                 </div>

                                 <!-- Offcanvas Edit -->
                                 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditKategori<?= $ktg['id_kategori'] ?>" aria-labelledby="offcanvasEditKategoriLabel" aria-modal="true" role="dialog">
                                    <div class="offcanvas-header py-6">
                                       <h5 id="offcanvasCategoryListLabel" class="offcanvas-title">Tambah Kategori</h5>
                                       <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body border-top">
                                       <form class="needs-validation mt-3" action="modules/kategori/proses/insert.php" method="POST" novalidate>
                                          <!-- Title -->
                                          <div class="mb-3">
                                             <label class="form-label" for="nama_kategori">Nama Kategori</label>
                                             <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $ktg['nama_kategori'] ?>" required>
                                             <div class="invalid-feedback">
                                                Nama Kategori Harus Diisi
                                             </div>
                                          </div>
                                          <!-- Description -->
                                          <div class="mb-6">
                                             <label class="form-label" for="deskripsi">Deskripsi</label>
                                             <textarea name="deskripsi" id="deskripsi" class="form-control" rows="7" required><?= $ktg['deskripsi'] ?>" </textarea>
                                             <div class="invalid-feedback">
                                                Deskripsi Harus Diisi
                                             </div>
                                          </div>
                                          <!-- Submit and reset -->
                                          <div class="mb-3">
                                             <button type="submit" class="btn btn-sm btn-primary me-1">Simpan</button>
                                             <button type="reset" class="btn btn-sm btn-outline-danger" data-bs-dismiss="offcanvas">Batal</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>

                                 <!-- Modal Hapus -->
                                 <div class="modal fade" id="hapusKategori<?= $ktg['id_kategori'] ?>" data-bs-backdrop="static" tabindex="-1">
                                    <div class="modal-dialog">
                                       <form class="modal-content" action="modules/kategori/proses/delete.php" method="POST">
                                          <div class="modal-header">
                                             <h5 class="modal-title d-flex align-items-center" id="backDropModalTitle">
                                                <i class="bx bx-trash me-2"></i> Hapus Kategori
                                             </h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body text-wrap">
                                             <input type="hidden" name="id_kategori" value="<?= $ktg['id_kategori'] ?>">
                                             <div class="alert alert-danger">
                                                Jika menghapus kategori, maka semua produk di dalam kategori ini akan ikut terhapus. Apakah anda yakin ingin melanjutkan menghapus kategori ini <b><?= $ktg['nama_kategori'] ?></b>?
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-outline-secondary me-1" data-bs-dismiss="modal">
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
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->